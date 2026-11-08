<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counsellor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        // Add any other columns you want to mass-assign later
        // 'scheduled_at',
        // 'notes',
    ];
}
