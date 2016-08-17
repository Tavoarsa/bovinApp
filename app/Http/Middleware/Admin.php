<?php

namespace BovinApp\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Session;


class Admin
{
    protected $auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

      public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if($this->auth->user()->type !='admin')
        {
             $message = 'No tienes priveligios de administrador!';  
             
          
            return redirect()->to('admin')->with('message', $message);;
        }
               

     
        return $next($request);
        }
    
}
