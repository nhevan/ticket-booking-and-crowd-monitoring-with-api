<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketsCheckerController extends Controller
{
    protected $ticket;
    protected $gate;
    protected $reg_id;
    protected $request;

    public function __construct(Request $request)
    {
        $this->gate = $request->gate;
        $this->reg_id = $request->reg_id;
        $this->request = $request;
        $this->ticket = Ticket::where('reg_id', $request->reg_id)->first();
    }

    public function fetchAllTickets()
    {
    	return Ticket::all('id', 'reg_id','name','phone', 'is_vip');
    }

    /**
     * Validates a ticket against a Reg_id
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function checkTicket()
    {
        $this->_validateRequest();
        if ($this->_isVipBarcode()) {
            return $this->_welcomeVip();
        }
        if ($this->_noSuchTicket()) {
            return $this->_denyVisitor();
        }
        if ($this->_isFirstTimeEntry()) {
            if($this->_isVip()){
                return $this->_welcomeVip();
            }
            return $this->_welcomeVisitor();
        }
        return $this->_reEntry();
    }

    /**
     * validates the submitted request and checks for reg_id and gate key
     */
    protected function _validateRequest()
    {
        $messages = [
            'reg_id.required' => 'Please provide reg_id key.',
            'gate.required' => 'Please provide gate key',
        ];
        return $this->validate($this->request, [
            'reg_id' => 'required',
            'gate' => 'required'
        ], $messages);
    }

    /**
     * checks if a barcode starts with JBC
     * @return boolean
     */
    protected function _isVipBarcode()
    {
        $split_reg_code = explode("-",$this->reg_id);
        if ($split_reg_code[0] == "JBC" && (int)$split_reg_code[1] <= 25000) {
            return true;
        }
    }

    /**
     * welcome the vip visitor
     * @return json 
     */
    protected function _welcomeVip()
    {
        $this->_incrementVipCount();
        return response()->json([
                'status_code' => 200,
                'message' => 'VIP'
            ])->header('Status', 200);
    }

    /**
     * checks of the ticket exists in the DB
     * @return boolean
     */
    protected function _noSuchTicket()
    {
        return !$this->ticket;
    }

    protected function _incrementVipCount()
    {
        $vip_count = Setting::where('setting', 'total_vip_entered')->first();
        $vip_count->value = $vip_count->value + 1;
        $vip_count->save();
    }

    /**
     * checks of a visitor is set to be VIP
     * @return boolean 
     */
    protected function _isVip()
    {
        return $this->ticket->is_vip;
    }
    /**
     * check if the visitor is entering for the first time
     * @return boolean
     */
    protected function _isFirstTimeEntry()
    {
        return !$this->ticket->gate_used;
    }

    /**
     * Assign a particular gate number to the ticket and welcome the user to the venue
     */
    protected function _assignGateNumberToTicket()
    {
        $this->ticket->gate_used = $this->gate;
        $this->ticket->save();
    }

    /**
     * response when the user is trying a reEntry
     * @return json
     */
    protected function _reEntry()
    {
    	$now = Carbon::now();
        return response()->json([
                'status_code' => 420,
                'message' => 'Re-Entry',
                'info' => 'The visitor has already entered the venue through gate '.$this->ticket->gate_used.' approximately '.$this->ticket->updated_at->diffForHumans($now, true).' ago.'
            ])->header('Status', 420);
    }

    /**
     * Deny the visitor as the ticket registration number did not match
     * @return json
     */
    protected function _denyVisitor()
    {
        return response()->json([
            'status_code' => 404,
            'message' => 'Not Allowed'
        ])->header('Status', 404);
    }

    /**
     * welcomes the visitor to the venue
     * @return json
     */
    protected function _welcomeVisitor()
    {
        $this->_assignGateNumberToTicket();
        return response()->json([
            'status_code' => 200,
            'message' => 'Pass'
        ])->header('Status', 200);
    }
}
