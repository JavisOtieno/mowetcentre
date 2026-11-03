<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'phone',
        'email',
        'notes',
        // Add any other columns you want to mass-assign later
        // 'scheduled_at',
        // 'notes',
    ];
}
