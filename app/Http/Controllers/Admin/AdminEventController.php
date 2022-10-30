<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use DB;

class AdminEventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request) {
        $request->validate([
  
        'title_of_the_event' => 'required|string',
        'location_of_the_event' => 'required|string',
        'event_date_time' => 'required',
       
        ]);
  
        $event = Event::create([
                   
            'user_id' => auth()->user()->id,
            'title_of_the_event' => $request->title_of_the_event,
            'location_of_the_event' => $request->location_of_the_event,
            'event_date_time' => $request->event_date_time,
           
        ]);
        return redirect()->back()->with('status','Added New Event!');
    }
  
         
}