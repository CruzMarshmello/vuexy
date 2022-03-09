<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo('App\Models\Filter', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Filter', 'parent_id')->orderBy('sort_order', 'asc');
    }

    /* Relationship FilterLocale */
    public function filterLocales()
    {
        return $this->hasMany('App\Models\FilterLocale');
    }

    public function locale($locale)
    {
        return $this->filterLocales()->where('locale', $locale)->first();
    }

    /* Relationship Category */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'filter_category', 'filter_id', 'category_id');
    }

    /* Relationship Product */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'filter_product', 'filter_id', 'product_id');
    }
}
