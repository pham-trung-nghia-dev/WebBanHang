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
        Schema::table('tbl_category_product', function (Blueprint $table) {
            if (!Schema::hasColumn('tbl_category_product', 'parent_id')) {
                $table->integer('parent_id')->nullable()->default(0)->after('category_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_category_product', function (Blueprint $table) {
            if (Schema::hasColumn('tbl_category_product', 'parent_id')) {
                $table->dropColumn('parent_id');
            }
        });
    }
};
