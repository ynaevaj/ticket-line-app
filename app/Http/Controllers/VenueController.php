<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use App\Http\Resources\VenueResource;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venues = Venue::all();
        return response([
            'venues' =>  VenueResource::collection($venues),
            'message' => 'Successful'
        ]);
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
    public function show(Venue $venue)
    {
        return response([
            'venue' => new VenueResource($venue),
            'message' => 'Sucessful'
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venue $venue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venue $venue)
    {
        //
    }

    public function search_venue(Request $request){
        $params = $request->all();
        $query = $params['venue_name'];


        $venue = Venue::where("venue_name", "LIKE", "%".$query."%", "OR", "%".strtoupper($query)."%")->orderBy('venue_name','asc')->get();

        return response([
            'venue' => new VenueResource($venue),
            'message' => 'Successful'
        ],200);
    }
}
