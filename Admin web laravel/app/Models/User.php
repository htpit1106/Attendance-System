<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Added role to fillable attributes
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function classes(){
        return $this->belongsToMany(Clazz::class, 'class_user');
    }

    public function attendanceLogs(){
        return $this->hasMany(AttendanceLog::class);
    }

    public function faceDescriptor(){
        return $this->hasOne(FaceDescriptor::class);
    } 
}
