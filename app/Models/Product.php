<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo('App\Models\Product', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Product', 'parent_id')->orderBy('id', 'asc');
    }

    /* Relationship ProductLocale */
    public function productLocales()
    {
        return $this->hasMany('App\Models\ProductLocale');
    }

    public function locale($locale)
    {
        return $this->ProductLocales()->where('locale', $locale)->first();
    }

    /* Relationship ProductImage */
    public function productImages()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    /* Relationship Category */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'category_product', 'product_id', 'category_id');
    }

    public function hasCategory($id)
    {
        if ($this->categories()->where('id', $id)->first()) {
            return true;
        }

        return false;
    }

    /* Relationship Filter */
    public function filters()
    {
        return $this->belongsToMany('App\Models\Filter', 'filter_product', 'product_id', 'filter_id');
    }

    public function hasFilter($id)
    {
        if ($this->filters()->where('id', $id)->first()) {
            return true;
        }

        return false;
    }
}
