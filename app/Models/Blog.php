<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    /* Relationship BlogLocale */
    public function blogLocales()
    {
        return $this->hasMany('App\Models\BlogLocale');
    }

    public function locale($locale)
    {
        return $this->blogLocales()->where('locale', $locale)->first();
    }

    /* Relationship Tag*/
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'tag_blog', 'blog_id', 'tag_id');
    }

    public function hasTag($id)
    {
        if ($this->tags()->where('id', $id)->first()) {
            return true;
        }

        return false;
    }
}
