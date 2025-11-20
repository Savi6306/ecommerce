<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('sellers', function (Blueprint $table) {
        $table->string('store_name')->nullable()->after('name');
        $table->string('phone')->nullable()->after('store_name');
        $table->string('address')->nullable()->after('phone');
        $table->string('profile_photo')->nullable()->after('address');
    });
}

public function down()
{
    Schema::table('sellers', function (Blueprint $table) {
        $table->dropColumn(['store_name','phone','address','profile_photo']);
    });
}
};
