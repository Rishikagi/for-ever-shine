<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class WholesaleAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
		if(!Session::get('5ferns_wholesale')){
			
			$request->session()->flash('error','Please first login');
			return redirect('/login');
		}
		
        return $next($request);
    }
}
