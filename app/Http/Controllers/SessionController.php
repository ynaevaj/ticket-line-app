<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Resources\SessionResource;

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
