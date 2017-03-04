<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class TicketsCheckerController extends Controller
{
    protected $ticket;
    protected $gate;

    public function __construct(Request $request)
    {
        $this->gate = $request->gate;
        $this->ticket = Ticket::where('reg_id', $request->reg_id)->first();
    }

    public function fetchAllTickets()
    {
    	return Ticket::all('id', 'reg_id','name','phone');
    }

    /**
     * Validates a ticket against a Reg_id
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function checkTicket()
    {
        if ($this->_noSuchTicket()) {
            return $this->_denyVisitor();
        }
        if ($this->_isFirstTimeEntry()) {
            return $this->_welcomeVisitor();
        }
        return $this->_reEntry();
    }

    /**
     * checks of the ticket exists in the DB
     * @return boolean
     */
    protected function _noSuchTicket()
    {
        return !$this->ticket;
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
        return response()->json([
                'status_code' => 420,
                'message' => 'The visitor has already entered the venue through gate '.$this->ticket->gate_used.' on '.$this->ticket->updated_at
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
            'message' => 'The provided barcode does not exist in our system.'
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
            'message' => 'The visitor is successfully authenticated.'
        ])->header('Status', 200);
    }
}
