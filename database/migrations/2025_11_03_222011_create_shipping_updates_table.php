<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipping_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tracking_id')
                  ->constrained('delivery_trackings')
                  ->onDelete('cascade');

            $table->string('status');                // e.g. "In Transit", "Delivered", etc.
            $table->string('location')->nullable();  // current location
            $table->timestamp('update_time')->nullable(); // optional: when this update happened
            $table->text('remarks')->nullable();     // extra notes or remarks
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipping_updates');
    }
};
