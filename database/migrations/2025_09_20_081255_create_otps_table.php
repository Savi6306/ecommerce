<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('otps', function (Blueprint $table) {
            $table->id();
            $table->string('email');               // Email linked to OTP
            $table->string('otp');                 // ✅ Fixed column name
            $table->timestamp('expires_at');       // Expiry time
            $table->boolean('is_used')->default(false); // Mark OTP as used
            $table->integer('attempts')->default(0);   // Count verification attempts
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('otps');
    }
};
