<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNull('approved_at')->get();

        return view('users', compact('users'));
    }

    public function approve($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['approved_at' => now()]);

        return redirect()->route('admin.users.index')->withMessage('Adviser approved successfully');
    }


    
   public function destroy($id){
    $user = User::find($id);
    $destination = 'images/avatars/'.$user->avatar;
    //  if(File::exists($destination)){
    //      File::delete($destination);
    //  }
    $user->delete();
    return redirect()->back()->with('status', 'Adviser Removed Successfully!');


    }
    
}
