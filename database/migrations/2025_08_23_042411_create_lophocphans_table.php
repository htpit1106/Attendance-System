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
        Schema::create('lophocphans', function (Blueprint $table) {
            $table->id();
            // id monhoc
            $table->string('malophp')->unique();
            $table->unsignedBigInteger('monhoc_id');
            $table->foreign('monhoc_id')->references('id')->on('monhocs')->onDelete('cascade');
            // id giangvien
            $table->unsignedBigInteger('giangvien_id');
            $table->foreign('giangvien_id')->references('id')->on('users')->onDelete('cascade');
            // ten lop hoc phan
            $table->string('tenlophp');
            // mo ta
            $table->text('mota')->nullable();
            // so tin chi
            $table->integer('sotinchi')->default(3);
            // ngay bad
            $table->date('ngaybatdau');
            // ngay ket thuc
            $table->date('ngayketthuc');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lophocphans');
    }
};
