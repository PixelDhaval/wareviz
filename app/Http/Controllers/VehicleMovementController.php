<?php

namespace App\Http\Controllers;

use App\Models\VehicleMovement;
use App\Http\Requests\StoreVehicleMovementRequest;
use App\Http\Requests\UpdateVehicleMovementRequest;

class VehicleMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => 200,
            'data' => VehicleMovement::with('party', 'supplier', 'cargo', 'godown', 'cargoDetail', 'weighReceipt', 'vehicleImage', 'vehicleInspection')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleMovementRequest $request)
    {
        VehicleMovement::create($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Vehicle Movement Created Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(VehicleMovement $vehicleMovement)
    {
        return response()->json($vehicleMovement->load('party', 'supplier', 'cargo', 'godown', 'cargoDetail', 'weighReceipt', 'vehicleImage', 'vehicleInspection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleMovementRequest $request, VehicleMovement $vehicleMovement)
    {
        $vehicleMovement->update($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Vehicle Movement Updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleMovement $vehicleMovement)
    {
        $vehicleMovement->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Vehicle Movement Deleted Successfully'
        ]);
    }
}
