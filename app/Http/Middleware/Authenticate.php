<?php

namespace BovinApp\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Auth\Guard;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

      /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
{
    if ($this->auth->guest()) {
        if ($request->ajax()) {
            return response('Unauthorized.', 401);
        } else {
            return redirect()->guest('auth/login');
        }
    }
    
    if($request->path() == 'order-detail') return $next($request);
    
    if(auth()->user()->type != "admin"){
        $message = 'Permiso denegado: Solo los administradores pueden entrar a esta sección';
        return redirect()->route('home')->with('message', $message);
    }
 
    return $next($request);
}
}
