<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Http\Requests\StorePartyRequest;
use App\Http\Requests\UpdatePartyRequest;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Party::query()->with('state', 'group');

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
            'parties' => $parties
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartyRequest $request)
    {
        $party = Party::create($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Party Created Successfully',
            'data' => $party
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Party $party)
    {
        
        return response()->json($party->load('state', 'group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartyRequest $request, Party $party)
    {
        $party->update($request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Party Updated Successfully',
            'data' => $party
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Party $party)
    {
        $party->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Party Deleted Successfully',
        ]);
    }

    public function getAllParties(Request $request)
    {
        $query = Party::query();
        $query->where('legal_name' , 'LIKE', "%{$request->search}%");
        $query->orWhere('trade_name' , 'LIKE', "%{$request->search}%");
        $query->orWhere('gst' , 'LIKE', "%{$request->search}%");
        $parties = $query->get();
        return response()->json($parties);
    }   
}
