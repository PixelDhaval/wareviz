<?php

namespace App\Http\Controllers;

use App\Models\VehicleInspection;
use App\Http\Requests\StoreVehicleInspectionRequest;
use App\Http\Requests\UpdateVehicleInspectionRequest;
use Illuminate\Http\Request;

class VehicleInspectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = VehicleInspection::query()->with('vehicleMovement'); 

        // **Filtering**
        $filters = $request->input('filters', []);
        foreach ($filters as $key => $value) {
            if ($value) {
                if($key == 'state_id'){
                    $query->where($key, "=", $value);
                } else {
                    $query->where($key, 'LIKE', "%$value%");
                } 
            }
        }

        // **Sorting & Ordering**
        $sortBy = $request->input('sortBy', 'id'); // Default sorting column
        $order = $request->input('order', 'asc');  // Default order

        // Validate sorting inputs
        if (!in_array($order, ['asc', 'desc'])) {
            $order = 'asc';
        }

        $query->orderBy($sortBy, $order);

        // **Pagination**
        $perPage = $request->input('perPage', 10); // Default 10 per page
        $parties = $query->paginate($perPage);

        return response()->json([
            "request" => $request->all(),
            'data' => $parties
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleInspectionRequest $request)
    {
        $vehicleInspection = VehicleInspection::create($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Vehicle Inspection Created Successfully',
            'data' => $vehicleInspection->load('vehicleMovement')
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
            'message' => 'Vehicle Inspection Updated Successfully',
            'data' => $vehicleInspection->load('vehicleMovement')
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
