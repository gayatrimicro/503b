<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAdmin
{
	public function handle($request, Closure $next)
	{
		if(Auth::check())
		{
			if(Auth::user()->user_type == "admin"){
				return $next($request);
			}
			else{
				//Auth::logout();
				return redirect('/');
			}
		}
		else{
			return redirect('/');
		}
		return $next($request);
	}
}