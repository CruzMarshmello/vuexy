<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    /* Relationship ContactUsLocale */
    public function contactUsLocales()
    {
        return $this->hasMany('App\Models\ContactUsLocale');
    }

    public function locale($locale)
    {
        return $this->contactUsLocales()->where('locale', $locale)->first();
    }
}
