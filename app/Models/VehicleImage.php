<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleImage extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleImageFactory> */
    use HasFactory;

    protected $fillable = [
        'vehicle_movement_id',
        'image_path',
        'uploaded_at',
        'remark',
    ];

    public function vehicleMovement(){
        return $this->belongsTo(VehicleMovement::class);
    }
}
