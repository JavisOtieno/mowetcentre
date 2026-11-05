<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
        protected $fillable = [
        'location',
        'patient_id',
        'specialist_id',
        // Add any other columns you want to mass-assign later
    ];
        public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
        public function specialist()
    {
        return $this->belongsTo(Specialist::class, 'specialist_id');
    }

}
