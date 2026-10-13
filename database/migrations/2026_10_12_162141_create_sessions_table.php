<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('sessions', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::dropIfExists('sessions');
    // }
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();

            $table->string('title');

            // Link to Counsellor
            $table->foreignId('counsellor_id')
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
        Schema::dropIfExists('sessions');
    }
};
