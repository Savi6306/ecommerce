<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
       Schema::create('chats', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id')->nullable();
    $table->unsignedBigInteger('seller_id')->nullable();
    $table->unsignedBigInteger('admin_id')->nullable();
    $table->enum('chat_type', ['user_seller', 'seller_admin'])->default('user_seller');
    $table->timestamps();

    // indexes (safe)
    $table->index(['user_id', 'seller_id']);
    $table->index(['seller_id', 'admin_id']);
});
    }
    public function down(): void {
        Schema::dropIfExists('chats');
    }
};
