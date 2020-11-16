<?php

namespace App\Http\Middleware;
use Closure;

class CorsMiddleware
{
    public function handle($request, Closure $next)
    {
        $headers = [
          'Access-Control-Allow-Origin' => '*',
          'Access-Control-Allow-Methods' => 'POST,GET,OPTIONS,PUT,DELETE,PATCH',
          'Access-Control-Allow-Credentials' => 'true',
          'Access-Control-Max-Age' => '86400',
          'Access-Control-Allow-Headers' => 'Content-Type,Authorization'
        ];

        if($request->isMethod('OPTIONS'))
        {
            return response()->json('{"method" : "OPTIONS"}', 200, $headers);
        }

        $response = $next($request);

        if($response instanceof \Symfony\Component\HttpFoundation\StreamedResponse)
        {
            foreach ($headers as $key => $value) {
                $response->headers->set($key, $value);
            }
        }
        else
        {
            foreach ($headers as $key => $value)
            {
                $response->header($key, $value);
            }
        }
        return $response;
    }
}
