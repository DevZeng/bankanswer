<?php

namespace App\Http\Middleware;

use Closure;

class Cross
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
        $response = $next($request);
//        $response->header('Access-Control-Allow-Origin', 'http://fwq.gdmeika.com');
//        $response->header('Access-Control-Allow-Origin', 'http://120.78.49.181');
        $response->header('Access-Control-Allow-Origin', 'http://119.23.202.220:8098');
//        $response->header('Access-Control-Allow-Origin', 'http://119.23.202.220:8098');
        $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type,x-xsrf-token, Cookie, Accept');
        $response->header('Access-Control-Allow-Methods', 'GET,POST,PATCH,PUT,OPTIONS,DELETE');
        $response->header('Access-Control-Allow-Credentials', 'true');
        return $response;
    }
}
