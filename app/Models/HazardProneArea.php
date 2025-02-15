<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HazardProneArea extends Model
{
    use HasFactory;

    protected $table = 'hazard_prone_area';

    protected $fillable = [
        'location_name',
        'location',
        'hazard_type',
        'risk_level',
        'status',
        'image',
    ];
}
