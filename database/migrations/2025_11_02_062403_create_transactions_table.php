<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            // Relations
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            // Payment info
            $table->string('transaction_id')->unique();
            $table->string('payment_method')->nullable(); // e.g., 'cod', 'razorpay', 'paypal'
            $table->decimal('amount', 10, 2)->default(0.00);
            $table->enum('status', ['pending', 'completed', 'failed', 'refunded'])->default('pending');
            $table->string('currency', 10)->default('INR');

            // Optional details
            $table->text('response_data')->nullable();
            $table->timestamp('transaction_date')->nullable();

            $table->timestamps();

            // Foreign key constraints
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
