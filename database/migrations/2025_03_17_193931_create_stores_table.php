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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->json('contact_pages')->nullable(); // Store all contact pages as JSON
            $table->string('latitude')->nullable(); // For map location
            $table->string('longitude')->nullable(); // For map location
            $table->timestamp('subscription_end_date')->nullable(); // Subscription end date
            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade'); // Link to store owner
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
