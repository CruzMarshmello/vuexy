<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagLocale extends Model
{
    use HasFactory;

    /* Relationship Tag */
    public function tags()
    {
        return $this->belongsTo('App\Models\Tag');
    }
}
