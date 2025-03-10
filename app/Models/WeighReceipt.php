<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeighReceipt extends Model
{
    /** @use HasFactory<\Database\Factories\WeighReceiptFactory> */
    use HasFactory;

    protected $fillable = [
        'vehicle_movement_id',
        'weigh_receipt_no',
        'weigh_receipt_date',
        'weigh_bridge',
    ];

    public function vehicleMovement(){
        return $this->belongsTo(VehicleMovement::class);
    }
}
