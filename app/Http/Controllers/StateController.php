<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(State::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStateRequest $request)
    {
        State::create($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'State Created Successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        return response()->json($state);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStateRequest $request, State $state)
    {
        $state->update($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'State Updated Successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        
    }
}
