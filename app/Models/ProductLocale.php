<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLocale extends Model
{
    use HasFactory;

    /* Relationship Product */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}