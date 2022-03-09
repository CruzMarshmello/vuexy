<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideshowLocale extends Model
{
    use HasFactory;

    /* Relationship Slideshow */
    public function slideshow()
    {
        return $this->belongsTo('App\Models\Slideshow');
    }
}
