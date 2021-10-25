<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TeacherRedirect
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
        if ($type != "teacher")
            if ($type == "admin")
                return redirect()->route('all-admins');
            elseif ($type == "student")
                return redirect()->route('all-categories');
            else
                return redirect()->route('permissions');

        return $next($request);
    }
}
