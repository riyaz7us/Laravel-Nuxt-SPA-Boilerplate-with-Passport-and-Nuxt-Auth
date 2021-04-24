<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveSession extends Model
{
    use HasFactory;

    protected $fillable = ['program_id','intro','agenda','live_chat_link','activate_chat','live_video_link','scheduled_on'];

    public function Program(){
        return $this->belongsTo(Program::class);
    }
}
