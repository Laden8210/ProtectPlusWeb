<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'contact_number',
        'email',
        'address',
        'dob',
        'status',
        'image',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
