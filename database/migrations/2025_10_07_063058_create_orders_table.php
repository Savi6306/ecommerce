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
   // Schema::create('orders', function (Blueprint $table) {
     //   $table->id();
       // $table->unsignedBigInteger('user_id');
        //$table->string('product_name');
        //$table->decimal('amount', 10, 2);
        //$table->string('payment_method');
        //$table->string('status')->default('Pending');
        //$table->timestamps();

        //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    //});


    Schema::table('orders', function (Blueprint $table) {
        $table->decimal('latitude', 10, 7)->nullable();
        $table->decimal('longitude', 10, 7)->nullable();
        $table->decimal('destination_lat', 10, 7)->nullable();
        $table->decimal('destination_lng', 10, 7)->nullable();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
