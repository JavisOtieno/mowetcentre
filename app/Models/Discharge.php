<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discharge extends Model
{
    use HasFactory;
    protected $fillable = [
        'notes',
        'patient_id',
        // Add any other columns you want to mass-assign later
        // 'scheduled_at',
        // 'notes',
    ];

    // Optional: relationship
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
