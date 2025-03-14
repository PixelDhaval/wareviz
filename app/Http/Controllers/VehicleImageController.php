<?php

namespace App\Http\Controllers;

use App\Models\VehicleImage;
use App\Http\Requests\StoreVehicleImageRequest;
use App\Http\Requests\UpdateVehicleImageRequest;
use Illuminate\Http\Request;

class VehicleImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = VehicleImage::query()->with('vehicleMovement');

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
    public function store(StoreVehicleImageRequest $request)
    {
        $vehicleImage = VehicleImage::create($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Vehicle Image Created Successfully',
            'data' => $vehicleImage->load('vehicleMovement')
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
            'message' => 'Vehicle Image Updated Successfully',
            'data' => $vehicleImage->load('vehicleMovement')
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
