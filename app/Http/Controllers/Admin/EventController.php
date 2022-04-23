<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
class EventController extends Controller
{
    public function addEvent(Request $request) {
        // dd($request);
        $createEvent = Event::create([
            'event_title' => $request->eTitle,
            'event_desc' => $request->eDesc,
            'event_date' => $request->eDate
        ]);
      
        if($createEvent) {
            return response([
                'mssg' => 'Event Successfully Added!!!'
            ],200);
        }

        return response([
            'error' => 'Unable to Add Event !!!'
        ],400);
    }

    public function getEvents() {
        $eventList = Event::all();
        return response([
            'eventList' => $eventList
        ],200); 
    }

    public function deleteEvent($id) {
        $deletePayTitles =  Event::where('id', $id)->delete();
        return response(([
            'Response' => "Event Deleted!!! "
        ]));
    }
    
    public function editEvent(Request $request) {
        $editEvents = Event::where('id', $request->id)->first();
        $editEvents->event_desc = $request->event_desc;
        $editEvents->event_title = $request->event_title;
        $editEvents->event_date = $request->event_date;
        
        if($editEvents->save()) {
            return response([
                'mssg' => 'Successfully Edited'
            ], 200);
        }
        return response([
            'error' => 'Unable to Edit'
        ], 409);
    }
}
