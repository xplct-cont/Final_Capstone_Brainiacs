<?php

namespace App\Http\Controllers\Admin\Parent_Conference_Record;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Anecdotal_Record;
use App\Models\Counseling_Anecdotal_Record;
use App\Models\Parent_Conference_Record;
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

class Love_Parent_Conference_RecordController extends Controller
{

     
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
 
        $parent_conference_record_love = Parent_Conference_Record::with(['student'])->where('student_id', '=', $id)->get();
        
        $student_lov = Student::find($id);
        return view('admin.student.Love.Parent_Conference_Record.index', compact('parent_conference_record_love', 'student_lov'));
      }
    
}