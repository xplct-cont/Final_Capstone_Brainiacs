<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Student;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Notifications;
use App\Notifications\EmailNotification;
use Notification;
use DB;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AdvisersExport;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $events = DB::table('events')->get();
        $user = DB::table('users')->whereNotNull('approved_at')->count();   
        $admin = DB::table('users')->where('admin', '1')->count();

        $student11 = DB::table('students')->where('year_section', 'Grade 11 - Wisdom')
        ->orWhere('year_section', 'Grade 11 - Charity')
        ->orWhere('year_section', 'Grade 11 - Faith')->count();

        $student12 = DB::table('students')->where('year_section', 'Grade 12 - Hope')
        ->orWhere('year_section', 'Grade 12 - Love')->count();

        $adviser = User::whereNotNull('approved_at')->get()->sortBy('advisory');  
        $adviser = User::where([
                ['approved_at', '!=', Null],
                [function($query) use ($request){
                    if(($adviser = $request->adviser)){
                        $query->orWhere('name', 'LIKE', '%'. $adviser . '%')
                        ->orWhere('advisory', 'LIKE', '%'. $adviser . '%')->get();
                    }
                }]
            ])
        
            ->orderBy("advisory","asc")
            ->paginate(3);  

        return view('home', compact('events', 'admin', 'student11', 'user', 'adviser', 'student12'),
        ['adviser' => $adviser])->with('i',(request()->input('page',1)-1)*5);

    //    $events = DB::table('events')->get();
    //    
     

    // //    $tests = DB::table('users')->join('students', 'users.id', '=', 'user_id')->count();
      
    //    $section = DB::table('users')->whereNotNull('approved_at')->get()->sortBy('advisory'); 
    //    $section = User::where([
    //     ['approved_at', '!=', Null],
    //     [function($query) use ($request){
    //         if(($section = $request->section)){
    //             $query->orWhere('advisory', 'LIKE', '%'. $section . '%')->get();
    //         }
    //     }]
    // ])

    // ->orderBy("advisory","asc")
    // ->paginate(4);

    //    return view('home', compact('user', 'admin', 'student', 'section', 'events'), ['section' => $section])
    //    ->with('i',(request()->input('page',1)-1)*5);
      
    // }
    }

    public function approval()
    {
    return view('approval');
    }


     public function destroy($id){

        $events = Event::find($id);
        $events->delete();
        return redirect()->back()->with('status', 'Event Removed Successfully!');
     }

     public function edit($id){
        $adviser = User::find($id);
        return view('admin.adviser.edit', compact('adviser'));
    }


    public function update(Request $request, $id){

        $adviser = User::find($id);
        $adviser->contact_no = $request->input('contact_no');
        $adviser->name = $request->input('name');
        $adviser->advisory = $request->input('advisory');
        $adviser->email = $request->input('email');
        $adviser->admin = $request->input('admin');
     
       
        if($request->hasFile('avatar')){
    
          $destination = 'images/avatars/'.$adviser->avatar;
        //   if(File::exists($destination)){
        //      File::delete($destination);
        //   }
          $file = $request->file('avatar');
          $extention = $file->getClientOriginalExtension();
          $filename = time().'.'. $extention;
          $file->move('images/avatars/', $filename);
          $adviser->avatar = $filename;
        
        }
    
        $adviser->update();
        return redirect()->back()->with('status', 'Adviser Updated Successfully!');
      
     }

     public function delete($id){
        $adviser = User::find($id);
        $destination = 'images/avatars/'.$adviser->avatar;
        //  if(File::exists($destination)){
        //      File::delete($destination);
        //  }
        $adviser->delete();
        return redirect()->back()->with('status', 'Adviser Removed Successfully!');
    
        }

        public function export_advisers_pdf(){
            $adviser = User::whereNotNull('approved_at')->get();
            $pdf = PDF::loadVIew('pdf.users', [
                'users' => $adviser
            ]);
            return $pdf->download('PNHS SHS Advisers.pdf');
        }
        
        public function export_advisers_excel(){
             $adviser = User::whereNotNull('approved_at')->get();
             return Excel::download(new AdvisersExport($adviser),'PNHS SHS Advisers.xlsx');
        }
    
}
   

