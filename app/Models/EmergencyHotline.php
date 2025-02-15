<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyHotline extends Model
{
    use HasFactory;

    protected $table = 'emergency_hotlines';

    protected $fillable = [
        'name',
        'emergency_hotline_type',
        'contact_number',
        'telephone_number',
        'address',
        'type',
        'status',
    ];
}
