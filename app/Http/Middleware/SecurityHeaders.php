<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Security Headers
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        
        // CSP yang lebih fleksibel agar Vite dan Font tetap jalan
        $csp = "default-src 'self' *; " .
               "script-src 'self' 'unsafe-inline' 'unsafe-eval' *; " .
               "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com *; " .
               "font-src 'self' data: https://fonts.gstatic.com *; " .
               "img-src 'self' data: https: *; " .
               "connect-src 'self' ws: wss: *; " .
               "frame-ancestors 'self';";
               
        $response->headers->set('Content-Security-Policy', $csp);

        return $response;
    }
}
