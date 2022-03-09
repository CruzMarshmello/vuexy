<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterLocale extends Model
{
    use HasFactory;

    /* Relationship Filter */
    public function filter()
    {
        return $this->belongsTo('App\Models\Filter');
    }
}
