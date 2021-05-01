<?php

namespace App\Http\Middleware;

use Closure;
use DB,Session,Response,Redirect;

class RetailerMiddleware
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
        if(Session::get('user_id') != ""){
            if(Session::get('type_id') == 1){
                return redirect()->route('Admin.Dashboard');
            }else if(Session::get('type_id') == 2){
                return redirect()->route('Master.Dashboard');
            }else if(Session::get('type_id') == 3){
                return redirect()->route('Distributor.Dashboard');
            }else if(Session::get('type_id') == 4){
                return $next($request);
            }
        }else{
            /* return redirect('Login'); */
            return redirect()->route('Login');
        }
        /*return $next($request);*/
    }
}
