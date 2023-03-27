<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Session;
use App\Models\Venue;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\EventResource;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return response(
            [
                'events' => EventResource::collection($events),
                'message' => 'Successful'
            ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
        return response([
            'event' => new EventResource($event),
            'message' => 'Successful'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }

    public function search_event(Request $request){
         $params = $request->all();

         if($request->filled('venue_id')){
            $venues = Session::where('venue_id', '=', $params['venue_id'])->get();

            $event = $venues;

         }else{
            $sessions = Session::where('id', '=', $params['session_id'])->with('event')->get();

            $event = $sessions;

         }
        

        return response([
            'session' => new EventResource($event),
            'message' => 'Successful',
        ],200);
    }

    
}
