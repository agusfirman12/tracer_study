<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    public function tracer_answer()
    {
        return $this->hasOne(trc_Tracer_answer::class);
    }

    public function major()
    {
        return $this->belongsTo(major::class);
    }
}
