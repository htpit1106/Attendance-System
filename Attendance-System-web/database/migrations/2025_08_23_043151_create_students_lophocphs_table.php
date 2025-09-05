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
        Schema::create('students_lophocphs', function (Blueprint $table) {
            $table->id();
            // id sinh vien
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            // id lop hoc phan
            $table->unsignedBigInteger('lophocphan_id');
            $table->foreign('lophocphan_id')->references('id')->on('lophocphans')->onDelete('cascade');
            // trang thai
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_lophocphs');
    }
};
