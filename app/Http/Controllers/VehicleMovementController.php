<?php

namespace App\Http\Controllers;

use App\Models\VehicleMovement;
use App\Http\Requests\StoreVehicleMovementRequest;
use App\Http\Requests\UpdateVehicleMovementRequest;
use Illuminate\Http\Request;

class VehicleMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = VehicleMovement::query()->with('party', 'supplier', 'cargo', 'godown', 'cargoDetail', 'weighReceipt', 'vehicleImage', 'vehicleInspection');

        // **Filtering**
        $filters = $request->input('filters', []);
        foreach ($filters as $key => $value) {
            if ($value) {
                if($key == 'party_id' || $key == 'supplier_id' || $key == 'cargo_id' || $key == 'godown_id'){
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
    public function store(StoreVehicleMovementRequest $request)
    {
        $vehicleMovement = VehicleMovement::create($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Vehicle Movement Created Successfully',
            'data' => $vehicleMovement->load('party', 'supplier', 'cargo', 'godown', 'cargoDetail', 'weighReceipt', 'vehicleImage', 'vehicleInspection')
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
            'message' => 'Vehicle Movement Updated Successfully',
            'data' => $vehicleMovement->load('party', 'supplier', 'cargo', 'godown', 'cargoDetail', 'weighReceipt', 'vehicleImage', 'vehicleInspection')
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
