<?php

namespace App\Http\Middleware;

use Closure;
use App\Setting;
use Illuminate\Http\Response;

class RegistrationMustBeAllowed
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
        $is_registration_allowed = Setting::where('setting', 'is_registration_allowed')->first()->value;
        if ($is_registration_allowed == 1) {
            return $next($request);
        }

        return new Response(view('registration-on-pause'));
    }
}
