<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustrialVisit extends Model
{
    use HasFactory;

    public function Program()
    {
        return $this->belongsTo(Program::class);
    }
}
