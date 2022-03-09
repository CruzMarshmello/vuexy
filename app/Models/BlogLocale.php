<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogLocale extends Model
{
    use HasFactory;

    /* Relationship Blog */
    public function blog()
    {
        return $this->belongsTo('App\Models\Blog');
    }
}
