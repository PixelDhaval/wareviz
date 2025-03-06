<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    /** @use HasFactory<\Database\Factories\PartyFactory> */
    use HasFactory;

    protected $fillable = [
        'legal_name',
        'trade_name',
        'gst',
        'pan',
        'address_line_1',
        'address_line_2',
        'city',
        'state_id',
        'group_id',
        'pincode',
        'phone',
        'email',
        'website',
        'tax_type',
        'is_tds_applicable',
        'tds_rate',
        'opening_balance'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
