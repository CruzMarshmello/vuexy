<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id')->orderBy('sort_order', 'asc');
    }

    /* Relationship CategoryLocale */
    public function categoryLocales()
    {
        return $this->hasMany('App\Models\CategoryLocale');
    }

    public function locale($locale)
    {
        return $this->categoryLocales()->where('locale', $locale)->first();
    }

    /* Relationship Filter */
    public function filters()
    {
        return $this->belongsToMany('App\Models\Filter', 'filter_category', 'category_id', 'filter_id');
    }

    public function hasFilter($id)
    {
        if ($this->filters()->where('id', $id)->first()) {
            return true;
        }

        return false;
    }

    /* Relationship Product */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'category_product', 'category_id', 'product_id');
    }
}
