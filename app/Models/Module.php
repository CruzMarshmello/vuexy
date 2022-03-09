<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    /* Relationship Permission */
    public function permissions()
    {
        return $this->hasMany('App\Models\Permission');
    }
}
