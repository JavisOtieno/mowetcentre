<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->longtext('description');

            // Link to Counsellor
            $table->foreignId('customer_id')
            ->constrained('users', 'id')
            ->cascadeOnDelete();
            // Add your other session columns here
            
            // $table->dateTime('scheduled_at')->nullable();
            // $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
