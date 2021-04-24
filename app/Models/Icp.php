<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icp extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'intro', 'domains', 'benefits', 'college_logos', 'testimonials', 'college_logos', 'cta',];
}
