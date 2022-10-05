<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CanEditStudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $student = $request->route('student');

        if(!$student->isEditable()){
              return redirect('/adviserpage/adviser/student/my-students')-> with('Error', 'Sorry you are not allowed to edit this data.');
        }
        return $next($request);
    }
}
