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
       Schema::create('vendor_product_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_product_id')->constrained('vendor_products')->onDelete('cascade');
            $table->unsignedBigInteger('attribute_id')->nullable(); // optional reference
            $table->string('attribute_name')->nullable();
            $table->string('attribute_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_product_attributes');
    }
};
