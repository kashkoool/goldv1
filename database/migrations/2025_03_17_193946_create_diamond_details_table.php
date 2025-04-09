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
        Schema::create('diamond_details', function (Blueprint $table) {
    $table->id();
    $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Link to product
    $table->json('stones')->nullable(); // JSON array of stones
    $table->decimal('carat_price_syp', 20, 2)->nullable(); // Price per carat in SYP
    $table->decimal('carat_price_usd', 20, 2)->nullable(); // Price per carat in USD
    $table->decimal('total_stone_price_syp', 20, 2)->nullable(); // Total stone price in SYP
    $table->decimal('total_stone_price_usd', 20, 2)->nullable(); // Total stone price in USD
    $table->decimal('total_stone_weight', 20, 2)->nullable(); // Total stone weight
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diamond_details');
    }
};
