<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleMovement extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleMovementFactory> */
    use HasFactory;

    protected $fillable = [
        'party_id',
        'supplier_id',
        'cargo_id',
        'godown_id',
        'type',
        'movement_type',
        'movement_at',
        'net_weight',
        'gross_weight',
        'tare_weight',
        'vehicle_no',
        'driver_name',
        'driver_no',
        'driver_lic_no',
        'lr_no',
        'lr_date',
        'rr_number',
        'rr_date',
        'is_direct',
        'is_inspection',
        'receipt_no',
        'receipt_date',
        'ref_movement_id',
        'vessel_name',
        'vessel_date',
        'loading_port',
        'loading_country',
        'shipment_type',
        'container_type',
        'container_no',
    ];

    protected $with = ['party', 'supplier', 'cargo', 'godown', 'cargoDetail', 'weighReceipt', 'vehicleImage', 'vehicleInspection'];

    public function party(){
        return $this->belongsTo(Party::class);
    }

    public function supplier(){
        return $this->belongsTo(Party::class);
    }

    public function cargo(){
        return $this->belongsTo(Cargo::class);
    }

    public function godown(){
        return $this->belongsTo(Godown::class);
    }

    public function cargoDetail(){
        return $this->hasOne(CargoDetail::class);
    }

    public function weighReceipt(){
        return $this->hasMany(WeighReceipt::class);
    }

    public function vehicleImage(){
        return $this->hasMany(VehicleImage::class);
    }

    public function vehicleInspection(){
        return $this->hasMany(VehicleInspection::class);
    }

    public function refMovement(){
        return $this->belongsTo(VehicleMovement::class, 'ref_movement_id');
    }
}
