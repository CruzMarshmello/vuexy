<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    /* Relationship InformationLocale */
    public function informationLocales()
    {
        return $this->hasMany('App\Models\InformationLocale');
    }

    public function locale($locale)
    {
        return $this->informationLocales()->where('locale', $locale)->first();
    }
}
