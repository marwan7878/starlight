<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SanitizeInput
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $inputData = $request->all();

        // Loop through all input fields and sanitize them
        foreach ($inputData as $key => $value) {
            // $inputData[$key] = strip_tags($value);
            // $inputData[$key] = htmlspecialchars($value);
            $inputData[$key] = preg_replace('/[^a-zA-Z0-9\s@.+-]/' , '', $value);
        }

        // Replace the request data with sanitized data
        $request->replace($inputData);

        return $next($request);
    }
}
