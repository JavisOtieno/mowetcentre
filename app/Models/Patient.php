<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'id_number',
        'phone',
        'email',
        'gender',
        'address',
        'date_of_birth',
        'age',
        'case_manager',
        // Add any other columns you want to mass-assign later
        // 'scheduled_at',
        // 'notes',
    ];
}
