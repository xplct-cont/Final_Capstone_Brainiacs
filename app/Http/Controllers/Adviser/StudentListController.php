<?php

namespace App\Http\Controllers\Adviser;


use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;



class StudentListController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){


        return view('adviserpage.adviser.student.studentlist');
    }


}

