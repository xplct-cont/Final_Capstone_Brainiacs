<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Notifications;
use App\Notifications\EmailNotification;
use Notification;
use DB;

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

       $section = DB::table('users')->whereNotNull('approved_at')->get()->sortBy('advisory'); 
       $section = User::where([
        ['approved_at', '!=', Null],
        [function($query) use ($request){
            if(($section = $request->section)){
                $query->orWhere('advisory', 'LIKE', '%'. $section . '%')->get();
            }
        }]
    ])

    ->orderBy("advisory","asc")
    ->paginate(4);


       return view('home', compact('user', 'admin', 'section', 'events'), ['section' => $section])
       ->with('i',(request()->input('page',1)-1)*5);
      

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

     public function sendMail(Request $request){
       
       }

     }
   

