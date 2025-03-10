<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\GodownController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\StateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleMovementController;
use App\Http\Controllers\CargoDetailController;
use App\Http\Controllers\WeighReceiptController;
use App\Http\Controllers\VehicleImageController;
use App\Http\Controllers\VehicleInspectionController;
use App\Models\User;

Route::post('/login', [UserController::class, 'login']);

Route::get('/test', function(){
    return response()->json(['message' => 'Hello World']);
});

Route::group(["middleware" => "auth:sanctum"], function () {
    Route::apiResource("cargos", CargoController::class);
    Route::get('/get-all-cargos', [CargoController::class , 'getAllCargos']);
    Route::apiResource("godowns", GodownController::class);
    Route::get('/get-all-godowns', [GodownController::class , 'getAllGodowns']);
    Route::apiResource("states", StateController::class);
    Route::apiResource("parties", PartyController::class);
    Route::get('/get-all-parties', [PartyController::class , 'getAllParties']);
    Route::apiResource("groups", GroupController::class);
    Route::apiResource("vehicle-movements", VehicleMovementController::class);
    Route::apiResource("cargo-details", CargoDetailController::class);
    Route::apiResource("weigh-receipts", WeighReceiptController::class);
    Route::apiResource("vehicle-images", VehicleImageController::class);
    Route::apiResource("vehicle-inspections", VehicleInspectionController::class);
});
