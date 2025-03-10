<?php

namespace App\Http\Controllers;

use App\Models\Godown;
use App\Http\Requests\StoreGodownRequest;
use App\Http\Requests\UpdateGodownRequest;
use Illuminate\Http\Request;

class GodownController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Godown::query();

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
        $godowns = $query->paginate($perPage);

        return response()->json($godowns);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGodownRequest $request)
    {
        Godown::create($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Godown Created Successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Godown $godown)
    {
        return response()->json($godown);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGodownRequest $request, Godown $godown)
    {
        $godown->update($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Godown Updated Successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Godown $godown)
    {
        $godown->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Godown Deleted Successfully',
        ]);
    }

    public function getAllGodowns(Request $request)
    {
        $query = Godown::query();
        $query->where('godown_no' , 'LIKE', "%{$request->search}%");
        $query->orWhere('godown_name' , 'LIKE', "%{$request->search}%");
        $cargos = $query->get();
        return response()->json($cargos);
    }
}
