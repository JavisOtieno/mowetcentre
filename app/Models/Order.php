<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

     protected $fillable = [
        'description',
        'customer_id',
        // Add any other columns you want to mass-assign later
        // 'scheduled_at',
        // 'notes',
    ];

    // Optional: relationship
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
