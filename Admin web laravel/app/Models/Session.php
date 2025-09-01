<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class Session extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'session_name',
        'start_date',
        'end_date',
        'status', // Added status to fillable attributes
    ];
    public function attendanceLogs()
    {
        return $this->hasMany(AttendanceLog::class);
    }
    public function clazz()
    {
        return $this->belongsTo(Clazz::class, 'class_id');
    }

}
