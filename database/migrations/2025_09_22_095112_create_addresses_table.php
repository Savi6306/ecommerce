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
       Schema::create('addresses', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id');
    $table->string('name');
    $table->string('phone');
    $table->string('pincode');
    $table->string('state');
    $table->string('city');
    $table->string('address_line1');
    $table->string('address_line2')->nullable();
    $table->boolean('is_default')->default(false);
    $table->timestamps();

    $table->unsignedBigInteger('customer_id');  // instead of user_id

$table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
