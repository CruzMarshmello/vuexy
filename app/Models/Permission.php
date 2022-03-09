<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    /* Relationship Module */
    public function module()
    {
        return $this->belongsTo('App\Models\Module');
    }

    /* Relationship User */
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_permission', 'permission_id', 'user_id');
    }
}
