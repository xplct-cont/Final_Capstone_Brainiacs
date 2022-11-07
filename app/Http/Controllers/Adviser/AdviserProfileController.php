<?php

namespace App\Http\Controllers\Adviser;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Image;


class AdviserProfileController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Show Edit Profile    
           return view('adviserpage.adviser.profile.editprofile', array('user'=>Auth::user())); 
        
   }


   public function update_avatar(Request $request){
           
         if($request->hasFile('avatar')){
             $avatar = $request->file('avatar');
             $filename = time() . '.' . $avatar->getClientOriginalExtension();
             Image::make($avatar)->resize(300, 300)->save(storage_path('/app/public/users-avatar/' . $filename));

             $user = Auth::user();
             $user->avatar = $filename;
             $user->save();

         }
         return view('adviserpage.adviser.profile.editprofile', array('user'=>Auth::user()));

   
   
   
        }

        public function edit($id){
        }



        public function update(Request $request, $id){
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->advisory = $request->input('advisory');
            $user->contact_no = $request->input('contact_no');
            $user->email = $request->input('email');

        
            $user->update();
            return redirect('adviserprofile');
          
         }

         public function passwordIndex($id){
            $user = User::find($id);
            return view('adviserpage.adviser.profile.changepassword', compact('user'));
         }

         public function passwordChange(Request $request){
          
            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);
       
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
       
            return redirect()->back()->with('status', 'Password changed successfully!');
         }
}
