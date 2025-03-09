<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoDetail extends Model
{
    /** @use HasFactory<\Database\Factories\CargoDetailFactory> */
    use HasFactory;

    protected $fillable = [
        'vehicle_movement_id',
        'is_bulk',
        'bags_qty',
        'bags_weight',
        'total_weight',
        'bags_type',
    ];

    function vehicleMovement(){
        return $this->belongsTo(VehicleMovement::class);
    }
}
