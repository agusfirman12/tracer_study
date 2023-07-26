<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumni extends Model
{
    use HasFactory;
    public function tracer_answer()
    {
        return $this->hasOne(Tracer_answer::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
