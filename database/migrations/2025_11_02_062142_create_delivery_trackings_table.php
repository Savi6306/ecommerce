<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('delivery_trackings', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('shipping_partner_id')->nullable();

            // Tracking information
            $table->string('tracking_number')->unique();
            $table->string('current_status')->default('Pending'); // e.g., "Dispatched", "In Transit", "Delivered"
            $table->string('current_location')->nullable();
            $table->timestamp('expected_delivery_date')->nullable();
            $table->text('remarks')->nullable();

            $table->timestamps();

            // Foreign key constraints (optional)
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('shipping_partner_id')->references('id')->on('shipping_partners')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('delivery_trackings');
    }
};
