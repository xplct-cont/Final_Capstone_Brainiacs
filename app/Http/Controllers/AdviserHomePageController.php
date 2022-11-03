<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AdviserHomePageController extends Controller
{
    public function index()
    {

        $user = DB::table('users')->whereNotNull('approved_at')->count();   
        $admin = DB::table('users')->where('admin', '1')->count();

        $student11 = DB::table('students')->where('year_section', 'Grade 11 - Wisdom')
        ->orWhere('year_section', 'Grade 11 - Charity')
        ->orWhere('year_section', 'Grade 11 - Faith')->count();

        $student12 = DB::table('students')->where('year_section', 'Grade 12 - Hope')
        ->orWhere('year_section', 'Grade 12 - Love')->count();

        return view('adviserpage.adviser.homepage', compact('user', 'admin', 'student11', 'student12'));


    }

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function approval()
{
    return view('approval');
}

}