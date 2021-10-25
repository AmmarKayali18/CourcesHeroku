<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserRedirect
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
        $type = auth()->user()->type;
        // Log::debug("type : " .print_r($type,true));
        if ($type != "admin")
            if ($type == "teacher")
                return redirect()->route('teacherCourses');
            elseif ($type == "student")
                return redirect()->route('all-categories');
            else
                return redirect()->route('permissions');

        return $next($request);
    }
}
