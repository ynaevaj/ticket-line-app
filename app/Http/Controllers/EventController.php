<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Session;
use App\Models\Venue;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\EventResource;
use Illuminate\Support\Str;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return response([
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
        $validator = Validator::make($request->all(), [
            'event_name' => 'required',
            'event_date' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => "Event cannot be created",
                'errors' => $validator->errors()
            ]);
        };
        
        $data = $request->all();
        $event = Event::create([
            'event_uuid' => Str::uuid(),
            'event_name' => $data['event_name'],
            'event_date' => $data['event_date'],
            'box_office_id' => $data['box_office_id'],
            'notes' => $data['notes']
        ]);

        return response([
            'event' => new EventResource($event),
            'message' => 'Event successfully created'
        ]);
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
            $venue_id = array_map('intval', explode(',', $params['venue_id']));

            $venues = Session::whereIn('venue_id', $venue_id)->with('event')->get();

            $event = $venues->map->only(['event']);

            $res = $event->pluck('event')->unique();
        }elseif($request->filled('session_id')){
            $session_id = array_map('intval', explode(',', $params['session_id']));

            $sessions = Session::whereIn('id', $session_id)->with('event')->get();

            $event = $sessions->map->only(['event']);

            $res = $event->pluck('event')->unique();   
        }

        return response([
            'event' => new EventResource($res),
            'message' => 'Successful',
        ],200);
    
    }
    
}
