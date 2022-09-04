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
    public function index()
    {

       $user = DB::table('users')->whereNotNull('approved_at')->count();   
       $admin = DB::table('users')->where('admin', '1')->count();
       return view('home', compact('user', 'admin'));

    }



    public function approval()
    {
    return view('approval');
    }

}
