<?php

namespace App\Http\Controllers;

use App\Models\VehicleImage;
use App\Http\Requests\StoreVehicleImageRequest;
use App\Http\Requests\UpdateVehicleImageRequest;

class VehicleImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => 200,
            'data' => VehicleImage::with('vehicleMovement')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleImageRequest $request)
    {
        VehicleImage::create($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Vehicle Image Created Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(VehicleImage $vehicleImage)
    {
        return response()->json($vehicleImage->load('vehicleMovement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleImageRequest $request, VehicleImage $vehicleImage)
    {
        $vehicleImage->update($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Vehicle Image Updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleImage $vehicleImage)
    {
        $vehicleImage->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Vehicle Image Deleted Successfully'
        ]);
    }
}
