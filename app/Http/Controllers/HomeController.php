<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

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


       return view('home', compact('user', 'admin', 'section'), ['section' => $section])
       ->with('i',(request()->input('page',1)-1)*5);
      

    }



    public function approval()
    {
    return view('approval');
    }

}
