<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StudentRedirect
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
        if ($type != "student")
            if ($type == "admin")
                return redirect()->route('all-admins');
            elseif ($type == "teacher")
                return redirect()->route('teacherCourses');
            else
                return redirect()->route('permissions');

        return $next($request);
    }
}
