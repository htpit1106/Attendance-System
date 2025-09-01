<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clazz extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'teacher_id',
        'class_name',
        'semester',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function teacher(){
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function students(){
        return $this->belongsToMany(User::class, 'class_user');
    }

    public function sessions(){
        return $this->hasMany(Session::class);
    }
}
