<?php

namespace App\Http\Controllers;

use App\Models\CargoDetail;
use App\Http\Requests\StoreCargoDetailRequest;
use App\Http\Requests\UpdateCargoDetailRequest;

class CargoDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => 200,
            'data' => CargoDetail::with('vehicleMovement')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCargoDetailRequest $request)
    {
        CargoDetail::create($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Cargo Detail Created Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CargoDetail $cargoDetail)
    {
        return response()->json($cargoDetail->load('vehicleMovement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCargoDetailRequest $request, CargoDetail $cargoDetail)
    {
        $cargoDetail->update($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Cargo Detail Updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CargoDetail $cargoDetail)
    {
        $cargoDetail->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Cargo Detail Deleted Successfully'
        ]);
    }
}
