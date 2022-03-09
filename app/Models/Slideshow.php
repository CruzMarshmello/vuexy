<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    use HasFactory;

    /* Relationship SlideshowLocale */
    public function slideshowLocales()
    {
        return $this->hasMany('App\Models\SlideshowLocale');
    }

    public function locale($locale)
    {
        return $this->slideshowLocales()->where('locale', $locale)->first();
    }
}
