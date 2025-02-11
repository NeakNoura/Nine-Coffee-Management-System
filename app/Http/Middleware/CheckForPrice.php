<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckForPrice
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
        if($request->url('products/checkout') OR $request->url('products/paypal' )
         OR $request->url('products/success')){

             if(Session::get('price') == 0) {
            return abort('403');
        }
    }
        return $next($request);
   }




   
}