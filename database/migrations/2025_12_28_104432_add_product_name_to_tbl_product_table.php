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
        // Chỉ thêm cột nếu chưa tồn tại
        if (!Schema::hasColumn('tbl_product', 'product_name')) {
            Schema::table('tbl_product', function (Blueprint $table) {
                $table->string('product_name')->nullable()->after('product_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_product', function (Blueprint $table) {
            $table->dropColumn('product_name');
        });
    }
};
