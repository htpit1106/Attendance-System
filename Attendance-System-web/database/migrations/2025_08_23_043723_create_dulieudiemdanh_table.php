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
        Schema::create('dulieudiemdanh', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('lophocphan_id');
            $table->foreign('lophocphan_id')->references('id')->on('lophocphans')->onDelete('cascade');
            // ngay gio diem danh
            $table->timestamp('ngaygiodiemdanh')->useCurrent();
            
            $table->enum('trangthai', ['present', 'absent', 'late'])->default('absent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dulieudiemdanh');
    }
};
