<?php

namespace App\Http\Controllers;

use App\Models\WeighReceipt;
use App\Http\Requests\StoreWeighReceiptRequest;
use App\Http\Requests\UpdateWeighReceiptRequest;
use Illuminate\Http\Request;

class WeighReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = WeighReceipt::query()->with('vehicleMovement');

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
    public function store(StoreWeighReceiptRequest $request)
    {
        $weighReceipt = WeighReceipt::create($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Weigh Receipt Created Successfully',
            'data' => $weighReceipt->load('vehicleMovement')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(WeighReceipt $weighReceipt)
    {
        return response()->json($weighReceipt->load('vehicleMovement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWeighReceiptRequest $request, WeighReceipt $weighReceipt)
    {
        $weighReceipt->update($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Weigh Receipt Updated Successfully',
            'data' => $weighReceipt->load('vehicleMovement')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WeighReceipt $weighReceipt)
    {
        $weighReceipt->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Weigh Receipt Deleted Successfully'
        ]);
    }
}
