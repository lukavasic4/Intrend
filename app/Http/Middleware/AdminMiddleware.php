<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if($request->session()->has("user")){
            $user = $request->session()->get("user");
            if($user->role_id == 1){
                return $next($request);
            }
            return redirect("/login")->with("message", "You are not admin!!");
        }
        return redirect("/login")->with("message", "You are not logged in!!");
    }
}
