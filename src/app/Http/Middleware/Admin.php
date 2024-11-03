<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function __construct(){
        if (!empty($_SESSION['User'])) {
            $this->User = $_SESSION['User'];
        }
    }

    public function handle(Request $request, Closure $next)
    {

        if (!empty($this->User)) {
            $result = ['outcome'=>true];
        }else {
            $result = ['outcome'=>false,'ErrorMessage'=>'Access Denied !!'];
        }
        if ($result['outcome']) {
            return $next($request);
        }else {
            return redirect('/Login')->with($result);
        }
        
    }
}
