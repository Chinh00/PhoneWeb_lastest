<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->get("isLogin") == "1" && ($request->session()->get("role") == "admin" || $request->session()->get("role") == "staff")){
            return $next($request);

        } else {
            return redirect("/admin/login");
        }
    }
}
