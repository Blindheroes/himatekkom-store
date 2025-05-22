<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class newUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Check if the user is authenticated
        if ($request->user()) {
            // Check if the user is new
            $newUser = $request->user()->isNewUser();
            if ($newUser) {
                // Redirect to the new user page
                // return redirect()->route('processing.registration');

                // abord the request
                return response()->json(['message' => 'You are a new user.'], 403);
            }
        }
        return $next($request);
    }
}
