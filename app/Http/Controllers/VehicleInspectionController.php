<?php

namespace App\Http\Controllers;

use App\Models\VehicleInspection;
use App\Http\Requests\StoreVehicleInspectionRequest;
use App\Http\Requests\UpdateVehicleInspectionRequest;

class VehicleInspectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => 200,
            'data' => VehicleInspection::with('vehicleMovement')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleInspectionRequest $request)
    {
        VehicleInspection::create($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Vehicle Inspection Created Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(VehicleInspection $vehicleInspection)
    {
        return response()->json($vehicleInspection->load('vehicleMovement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleInspectionRequest $request, VehicleInspection $vehicleInspection)
    {
        $vehicleInspection->update($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Vehicle Inspection Updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleInspection $vehicleInspection)
    {
        $vehicleInspection->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Vehicle Inspection Deleted Successfully'
        ]);
    }
}
