<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('WareViz')->plainTextToken;
                return response()->json([
                    'status' => 200,
                    'message' => 'Login Successful',
                    'data' => [
                        'token' => $token
                    ]
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Invalid Credentials'
                ]);
            }
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Invalid Credentials'
            ]);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsersRequest $request, User $User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $User)
    {
        //
    }
}
