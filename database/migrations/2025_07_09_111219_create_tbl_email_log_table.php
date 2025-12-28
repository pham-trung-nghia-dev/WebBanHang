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
        Schema::create('tbl_email_log', function (Blueprint $table) {
            $table->id();
            $table->string('TenSanPham')->nullable();
            $table->string('TenKhachHang')->nullable();
            $table->string('email');
            $table->integer('SoLuong')->nullable();
            $table->unsignedBigInteger('DonHang');
            $table->string('PhuongThucThanhToan');
            $table->decimal('TongTien', 15, 2);
            $table->text('NoiDung')->nullable(); // Nội dung email (json hoặc mô tả)
            $table->string('TrangThai')->default('Đã gửi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_email_log');
    }
};
