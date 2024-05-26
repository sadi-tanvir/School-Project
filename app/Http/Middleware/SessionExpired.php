<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class SessionExpired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('AdminId') && !Session::has('schoolAdminId') && !Session::has('studentId') && !Session::has('teacherID')) {
            if (!$request->is('login')) {
                return redirect('/login')->with('error', 'Your session has expired. Please log in again.');
            }
        }

        return $next($request);
    }
}
