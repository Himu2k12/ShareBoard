<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
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
        if($request->user()===null)
        {
            return response('Not authored!!');
        }

        $action=$request->route()->getAction();

        $roles=isset($action['role']) ? $action['role']:null;
        if($request->user()->userRole($roles))
        {
            return $next($request);
        }
       $request->session()->flush();
        return response("You are Not Authored For this Request");


    }
}
