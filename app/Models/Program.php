<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = ['title','cover_image', 'hero_benefits','program_benefits','school_name','school_logo','desc_1','desc_2', 'hero_benefits','starts_on','duration','introduction','intro_video_link', 'intro_video_desc','orientation','live_session','visit','certificate'];

    protected $casts = [];

    public function LiveSession(){
        return $this->hasOne(LiveSession::class);
    }

    public function IndustrialVisit()
    {
        return $this->hasOne(IndustrialVisit::class);
    }
}
