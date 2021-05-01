<?php

namespace App\Http\Middleware;

use Closure;
use DB,Session,Response,Redirect;

class DistributorMiddleware
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
        if(Session::get('user_id') != "")
        {
            if(Session::get('type_id') == 1)
            {
                return redirect()->route('Admin.Dashboard');
            }
            else if(Session::get('type_id') == 2)
            {
                return redirect()->route('Master.Dashboard');
            }
            else if(Session::get('type_id') == 3)
            {
                return $next($request);
            }
            else if(Session::get('type_id') == 4){
                return redirect()->route('Retailer.Dashboard');
            }
        }else{
            /* return redirect('Login'); */
            return redirect()->route('Login');
        }
        /*return $next($request);*/
    }
}
