<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Http\Resources\GroupResource;

use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
        return response([
            'groups' => GroupResource::collection($groups),
            'message' => 'Sucessful'
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'group_name' => 'required|unique:groups',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => "Group cannot be created",
                'errors' => $validator->errors()
            ]);
        };

        $data = $request->all();
        $group = Group::create([
            'group_name' => $data['group_name'],
            'ticket_type_id' => $data['ticket_type_id'],
        ]);

        $result = [
            'group' => $group,
            'message' => 'Group Successfully created'
        ];

        return response()->json($result);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        return response([
            'group' => new GroupResource($group),
            'message' => 'Successful'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }
}
