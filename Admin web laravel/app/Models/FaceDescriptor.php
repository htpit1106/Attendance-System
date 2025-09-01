<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaceDescriptor extends Model
{
     use HasFactory;
    protected $filltable =[
        'user_id',
        'descriptor',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
