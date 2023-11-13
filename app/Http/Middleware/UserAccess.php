<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAccess
{
   /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
 
     /*public function handle(Request $request, Closure $next, $userType)
     {
         if(auth()->user()->type == $userType){
             return $next($request);
         }
             
         return response()->json(['You do not have permission to access for this page.']);
          //return response()->view('errors.check-permission'); 
     }*/
     public function handle($request, Closure $next, ...$roles)
{
        $userType = auth()->user()->type;

        if (!in_array($userType, $roles)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
}

}
