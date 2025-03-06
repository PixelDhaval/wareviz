<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Http\Requests\StoreCargoRequest;
use App\Http\Requests\UpdateCargoRequest;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Cargo::query();

        // **Filtering**
        $filters = $request->input('filters', []);
        foreach ($filters as $key => $value) {
            if ($value) {
                $query->where($key, 'LIKE', "%$value%");
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
        $cargos = $query->paginate($perPage);

        return response()->json($cargos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCargoRequest $request)
    {
        Cargo::create($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Cargo Created Successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cargo $cargo)
    {
        return response()->json($cargo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCargoRequest $request, Cargo $cargo)
    {
        $cargo->update($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Cargo Updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Cargo Deleted Successfully'
        ]);
    }
}
