<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvacuationArea extends Model
{
    use HasFactory;

    protected $table = 'evacuation_areas';

    protected $fillable = [
        'name',
        'address',
        'capacity',
        'type_facility',
        'status',
        'image',
    ];
}
