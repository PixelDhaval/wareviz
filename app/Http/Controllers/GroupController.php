<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Group::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupRequest $request)
    {
        Group::create($request->validated());
        return response()->json(['message' => 'Group created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        return $group;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        $group->update($request->validated());
        return response()->json(['message' => 'Group updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return response()->json(['message' => 'Group deleted successfully'], 200);
    }
}
