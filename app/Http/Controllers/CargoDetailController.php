<?php

namespace App\Http\Controllers;

use App\Models\CargoDetail;
use App\Http\Requests\StoreCargoDetailRequest;
use App\Http\Requests\UpdateCargoDetailRequest;
use Illuminate\Http\Request;

class CargoDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = CargoDetail::query()->with('vehicleMovement');

        // **Filtering**
        $filters = $request->input('filters', []);
        foreach ($filters as $key => $value) {
            if ($value) {
                if($key == 'vehicle_movement_id') {
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
    public function store(StoreCargoDetailRequest $request)
    {
        $cargoDetail = CargoDetail::create($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Cargo Detail Created Successfully',
            'data' => $cargoDetail->load('vehicleMovement')
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
            'message' => 'Cargo Detail Updated Successfully',
            'data' => $cargoDetail->load('vehicleMovement')
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
