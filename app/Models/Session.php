<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'mode',
        'counsellor_id',
        // Add any other columns you want to mass-assign later
        // 'scheduled_at',
        // 'notes',
    ];

    // Optional: relationship
    public function counsellor()
    {
        return $this->belongsTo(User::class, 'counsellor_id');
    }
}
