<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // 🔗 Relations
            $table->foreignId('seller_id')->constrained('sellers')->onDelete('cascade');
            $table->foreignId('buyer_id')->constrained('users')->onDelete('cascade');

            // 🧾 Order info
            $table->string('order_number')->unique();
            $table->decimal('total_amount', 10, 2);

            // 💳 Payment & status
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->string('payment_method')->nullable(); // e.g. COD, Card, UPI
            $table->enum('status', ['pending', 'approved', 'in_transit', 'delivered', 'cancelled'])->default('pending');

            // 🧑‍💼 Admin control
            $table->boolean('approved_by_admin')->default(false); // Admin approval
            $table->timestamp('delivered_at')->nullable(); // When delivered
            $table->text('cancel_reason')->nullable(); // If cancelled
            $table->enum('refund_status', ['none', 'requested', 'approved', 'rejected'])->default('none'); // Refund flow

            // 📦 Shipping
            $table->string('shipping_address')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('tracking_number')->nullable();

            // 💰 Taxes & discounts
            $table->decimal('tax_amount', 10, 2)->default(0);
            $table->decimal('discount_amount', 10, 2)->default(0);

            $table->timestamps();
            $table->softDeletes(); // optional (for recover deleted orders)
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
