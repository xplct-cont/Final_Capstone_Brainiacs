<?php

namespace App\Http\Controllers\Adviser;


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

class ParentListController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index(Request $request){

        // $wisdomStudents = Student::where('user_id', auth()->user()->id)->get();
        $parentLists = Student::where([
            ['user_id', auth()->user()->id],
            [function($query) use ($request){
                if(($my_students = $request->my_students)){
                    $query->orWhere('lastname', 'LIKE', '%'. $my_students . '%')
                    ->orWhere('firstname', 'LIKE', '%'. $my_students . '%')
                    ->orWhere('middlename', 'LIKE', '%'. $my_students . '%')->get();
    
                    
                }
            }]
        ])
    
        ->orderBy("lastname","asc")
        ->paginate(20);
    
           return view('adviserpage.adviser.parent.index',compact('parentLists'),['parentList'=>$parentLists])
           ->with('i',(request()->input('page',1)-1)*5);
        }

        public function emailParent($id){
            $parentLists = Student::where('user_id', auth()->user()->id)->find($id);
            if (empty($parentLists)) {

                abort(404);
            }

           return view('adviserpage.adviser.parent.show')->with('parentLists', $parentLists);
        }
    

}