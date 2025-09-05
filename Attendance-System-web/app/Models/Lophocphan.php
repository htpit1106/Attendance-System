<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lophocphan extends Model
{
    protected $fillable = [
        'malophp',
        'monhoc_id',
        'giangvien_id',
        'tenlophp',
        'mota',
        'sotinchi',
        'ngaybatdau',
        'ngayketthuc',
    ];

    // Quan hệ với môn học 1 môn học có nhiều lớp học phần
    public function monhoc()
    {
        return $this->belongsTo(Monhoc::class);
    }

    // Quan hệ với giảng viên (User) một giảng viên có thể phụ trách nhiều lớp học phần
    public function giangvien()
    {
        return $this->belongsTo(User::class, 'giangvien_id');
    }
}
