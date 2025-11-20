<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // e.g. PGMS10
            $table->enum('type', ['fixed', 'percent']); // discount type
            $table->decimal('value', 8, 2); // discount value
            $table->decimal('min_order_amount', 8, 2)->default(0); // condition
            $table->date('expiry_date')->nullable(); // expiry
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('coupons');
    }
};
