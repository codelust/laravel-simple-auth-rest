<?php

namespace Frontiernxt\LaravelRESTApi\Http\Middleware;

use Illuminate\Http\Request;

use Closure;

class CheckAppId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(null === $request->header('X-APP-ID')){  
            return response()->json(array('error'=>'Please set valid X-APP-ID header'));
        }  
  
        return $next($request);
    }
}
