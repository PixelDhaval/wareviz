<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Godown extends Model
{
    /** @use HasFactory<\Database\Factories\GodownFactory> */
    use HasFactory;

    protected $fillable = [
        'godown_name',
        'description',
        'godown_no',
        'location',
        'latitude',
        'longitude',
        'capacity'
    ];
}
