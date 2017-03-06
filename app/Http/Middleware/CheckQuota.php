<?php

namespace App\Http\Middleware;

use Closure;
use App\Ticket;
use App\Setting;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class CheckQuota
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ticket_quota = Setting::where('setting', 'ticket_quota')->first()->value;
        $total_ticket = Ticket::count();
        if ($total_ticket < $ticket_quota) {
            return $next($request);
        }

        return Redirect::away('http://www.youngbangla.org');
    }
}
