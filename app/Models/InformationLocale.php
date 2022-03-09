<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationLocale extends Model
{
    use HasFactory;

    /* Relationship Information */
    public function information()
    {
        return $this->belongsTo('App\Model\Information');
    }
}
