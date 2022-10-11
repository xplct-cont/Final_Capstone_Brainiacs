<?php

namespace App\Http\Controllers\Admin\Parent;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Rules\MatchOldPassword;
use Response;
use DB;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ParentExport;

class ParentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index(Request $request){

        // $wisdomStudents = Student::where('year_section', 'Grade 11 - Wisdom')->get();
        $Students11_12 = Student::where([
            ['year_section', '!=' , null],
            [function($query) use ($request){
                if(($all_students = $request->all_students)){
                    $query->orWhere('lastname', 'LIKE', '%'. $all_students . '%')
                    ->orWhere('firstname', 'LIKE', '%'. $all_students . '%')
                    ->orWhere('middlename', 'LIKE', '%'. $all_students . '%')->get();
    
                    
                }
            }]
        ])
    
        ->orderBy("lastname","asc")
        ->paginate(20);
    
           return view('admin.parent.index',compact('Students11_12'),['Students11_12'=>$Students11_12])
           ->with('i',(request()->input('page',1)-1)*5);
        }

        public function emailToParent($id){
            $Students11_12 = Student::find($id);
           return view('admin.parent.show')->with('students11_12', $Students11_12);
        }
    

}