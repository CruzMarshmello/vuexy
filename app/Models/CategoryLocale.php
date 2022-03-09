<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryLocale extends Model
{
    use HasFactory;

    /* Relationship Category */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
