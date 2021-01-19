<?php

namespace App\Http\Middleware;

use Closure;

class ApiAuthenticate
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
        
        if(strpos($request->getPathInfo(), '/api/') !== false)
        {
            $auth = $request->header("Authorization");
            $appId = $request->header("AppId");

            if ( $auth != null and $appId != null)
            {
                $key = explode(' ', $auth);

                $api_auth = base64_encode("Quetzalcoatl.21;AJGA#17sfTHrd{");
                $appid_express = base64_decode('App-Express-Api');

                if ($key[0] = 'Basic' && $key[1] !== $api_auth && $appid_express !== $appId )
                {
                    return response()->json(['error' => 'Not authorized.'],401);
                }
            }else{
                return response()->json(['error' => 'Not authorized.'],401);
            }
        }

    return $next($request);
    }
}
