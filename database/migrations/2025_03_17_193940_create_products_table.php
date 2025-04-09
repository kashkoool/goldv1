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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained()->onDelete('cascade'); // Link to store
            $table->string('name'); // Product name
            $table->enum('material', ['gold', 'silver', 'diamond']); // Product material
            $table->enum('karat', ['18', '21', '22', '24', '925'])->nullable(); // Karat for gold and silver
            $table->text('description')->nullable(); // Product description
            $table->decimal('weight', 20, 2)->nullable(); // Weight of the product
            $table->decimal('price_per_gram_syp', 20, 2)->nullable(); // Price per gram in SYP
            $table->decimal('price_per_gram_usd', 20, 2)->nullable(); // Price per gram in USD
            $table->decimal('crafting_fee', 20, 2)->nullable(); // Crafting fee (optional)
            $table->decimal('total_price_syp', 20, 2)->nullable(); // Total price in SYP
            $table->decimal('total_price_usd', 20, 2)->nullable(); // Total price in USD
            $table->enum('item_type', [
                'ring', 'bracelet', 'necklace', 'earring', 'set', 'coin', 'half_coin', 'quarter_coin',
                'ounce', 'anklet', 'hand_lock', 'hanger', 'name'
            ]); // Product type
            $table->boolean('is_featured')->default(false); // Whether the product is featured on the homepage

            // Set-specific fields (nullable)
            $table->json('set_items')->nullable(); // JSON array of set items (e.g., ring, bracelet, earring)

           // Ring-specific fields (nullable)
    $table->enum('ring_size', [
        '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25'
    ])->nullable(); // Enum for ring sizes from 12 to 25
    $table->json('stones')->nullable(); // JSON array of stones  //this contain [{"stone_type","stone_color","stone_count","stone_weight","carat_price_syp","carat_price_usd","stone shapes"}]
    // $table->decimal('carat_price_syp', 20, 2)->nullable(); // Price per carat in SYP
    // $table->decimal('carat_price_usd', 20, 2)->nullable(); // Price per carat in USD
    // $table->decimal('total_stone_price_syp', 20, 2)->nullable(); // Total stone price in SYP
    // $table->decimal('total_stone_price_usd', 20, 2)->nullable(); // Total stone price in USD
    $table->decimal('total_stone_weight', 20, 2)->nullable(); // Total stone weight

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
