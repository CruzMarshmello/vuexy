<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsLocale extends Model
{
    use HasFactory;

    /* Relationship ContactUs */
    public function contactUs()
    {
        return $this->belongsTo('App\Models\ContactUs');
    }
}
