<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class admincheckexiste
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
        if(Sentinel::check()){
            $user=Sentinel::getUser();
            if($user->user_type=='2'){
                return $next($request);
            }
            else{
                return redirect('admin/login');
            }
            
        }else{
            return redirect('admin/login');
        }
    }
}
