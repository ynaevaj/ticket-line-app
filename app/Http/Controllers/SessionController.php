<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Resources\SessionResource;
use App\Models\Event;
use App\Models\Venue;

use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = Session::all();
        return response([
            'sessions' => SessionResource::collection($sessions),
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
            'session_name' => 'required',
            'event_id' => 'required|exists:events,id',
            'venue_id' => 'required|exists:venues,id',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => "Session cannot be created",
                'errors' => $validator->errors()
            ]);
        }

        $data = $request->all();
        $session = Session::create([
            'session_name' => $data['session_name'],
            'event_id' => $data['event_id'],
            'venue_id' => $data['venue_id']
        ]);

        return response([
            'session' => new SessionResource($session),
            'message' => 'Session successfully created'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Session $session)
    {
        //
        return response([
            'session' => new SessionResource($session),
            'message' => 'Successful'
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session)
    {
        //
    }
}
