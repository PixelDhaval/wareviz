<?php

namespace App\Http\Controllers;

use App\Models\WeighReceipt;
use App\Http\Requests\StoreWeighReceiptRequest;
use App\Http\Requests\UpdateWeighReceiptRequest;

class WeighReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => 200,
            'data' => WeighReceipt::with('vehicleMovement')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWeighReceiptRequest $request)
    {
        WeighReceipt::create($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Weigh Receipt Created Successfully'
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
            'message' => 'Weigh Receipt Updated Successfully'
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
