<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /* Relationship TagLocale */
    public function tagLocales()
    {
        return $this->hasMany('App\Models\TagLocale');
    }

    public function locale($locale)
    {
        return $this->tagLocales()->where('locale', $locale)->first();
    }

    /* Relationship Blog */
    public function blogs()
    {
        return $this->belongsToMany('App\Models\Blog', 'tag_blog', 'tag_id', 'blog_id');
    }
}
