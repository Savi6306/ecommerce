<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendor_product_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_product_id')
                  ->constrained('vendor_products')
                  ->onDelete('cascade');
            $table->string('image');
            $table->boolean('is_featured')->default(false);
            $table->integer('position')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendor_product_galleries');
    }
};
