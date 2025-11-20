<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Add category_id and brand_id if they don't exist
            if (!Schema::hasColumn('products', 'category_id')) {
                $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
            }
            if (!Schema::hasColumn('products', 'brand_id')) {
                $table->foreignId('brand_id')->nullable()->constrained('brands')->onDelete('set null');
            }

            // Add approved_by_admin
            if (!Schema::hasColumn('products', 'approved_by_admin')) {
                $table->boolean('approved_by_admin')->default(false);
            }

            // Add soft deletes
            if (!Schema::hasColumn('products', 'deleted_at')) {
                $table->softDeletes();
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop foreign keys first
            if (Schema::hasColumn('products', 'category_id')) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            }
            if (Schema::hasColumn('products', 'brand_id')) {
                $table->dropForeign(['brand_id']);
                $table->dropColumn('brand_id');
            }

            // Drop approved_by_admin
            if (Schema::hasColumn('products', 'approved_by_admin')) {
                $table->dropColumn('approved_by_admin');
            }

            // Drop soft deletes
            if (Schema::hasColumn('products', 'deleted_at')) {
                $table->dropColumn('deleted_at');
            }
        });
    }
};
