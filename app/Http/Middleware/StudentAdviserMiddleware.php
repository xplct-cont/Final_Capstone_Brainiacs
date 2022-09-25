<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentAdviserMiddleware
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
         //get the post id from the request
         $student =  $request->route('student');

         if($student->user_id != auth()->user()->id) {
             return redirect('/students/my-students')->with('Error','Sorry, you are not the adviser of this students.');
         }
 
         return $next($request);
    }
}
