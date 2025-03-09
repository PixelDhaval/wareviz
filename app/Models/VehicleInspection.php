<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleInspection extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleInspectionFactory> */
    use HasFactory;

    protected $fillable = [
        'vehicle_movement_id',
        'inspection_no',
        'inspection_date',
        'inspection_type',
        'inspection_by',
        'inspection_result',
        'remark',
    ];

    public function vehicleMovement(){
        return $this->belongsTo(VehicleMovement::class);
    }
}
