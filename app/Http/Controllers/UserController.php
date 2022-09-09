<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::whereNull('approved_at')->get();

        $users = User::where([
            ['approved_at', '=', Null],
            [function($query) use ($request){
                if(($term = $request->term)){
                    $query->orWhere('name', 'LIKE', '%'. $term . '%')->get();
                }
            }]
        ])

        ->orderBy("name","asc")
        ->paginate(10);





        return view('users', compact('users'), ['users' => $users])
        ->with('i',(request()->input('page',1)-1)*5);

       


    }

    public function approve($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['approved_at' => now()]);

        return redirect()->route('users')->withMessage('Request approved successfully');
    }


    
   public function destroy($id){
    $user = User::find($id);
    $destination = 'images/avatars/'.$user->avatar;
    //  if(File::exists($destination)){
    //      File::delete($destination);
    //  }
    $user->delete();
    return redirect()->back()->with('status', 'Request Removed Successfully!');


    }
    
}
