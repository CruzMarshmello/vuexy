<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Filter;
use App\Models\Category;
use App\Models\CategoryLocale;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent_id', 0)
                    ->orderBy('sort_order', 'asc')
                    ->paginate(1);

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['name' => 'Categories']
        ];

        return view('admin.categories.index', compact('categories', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', 0)
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $filters = Filter::where('parent_id', 0)
                ->orderBy('sort_order', 'asc')
                ->get();

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['link' => 'admin/categories', 'name' => 'Categories'],
            ['name' => 'Create']
        ];

        return view('admin.categories.create', compact('categories', 'filters', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'english_name' => 'required|different:thai_name',
            'english_slug' => 'required|alpha_dash|different:thai_slug|unique:category_locales,slug',
            'english_meta_title' => 'required',
            'thai_name' => 'required|different:english_name',
            'thai_slug' => 'required|alpha_dash|different:english_slug|unique:category_locales,slug',
            'thai_meta_title' => 'required',
            'sort_order' => 'required'
        ]);

        $category = new Category();
        $category->sort_order = $request->sort_order;
        $category->parent_id = $request->category;
        $category->save();

        $categoryLocale = new CategoryLocale();
        $categoryLocale->locale = 'en';
        $categoryLocale->name = $request->english_name;
        $categoryLocale->slug = $request->english_slug;
        $categoryLocale->meta_title = $request->english_meta_title;
        $categoryLocale->meta_keyword = $request->english_meta_keyword;
        $categoryLocale->meta_description = $request->english_meta_description;
        $categoryLocale->category_id = $category->id;
        $categoryLocale->save();

        $categoryLocale = new CategoryLocale();
        $categoryLocale->locale = 'th';
        $categoryLocale->name = $request->thai_name;
        $categoryLocale->slug = $request->thai_slug;
        $categoryLocale->meta_title = $request->thai_meta_title;
        $categoryLocale->meta_keyword = $request->thai_meta_keyword;
        $categoryLocale->meta_description = $request->thai_meta_description;
        $categoryLocale->category_id = $category->id;
        $categoryLocale->save();

        if ($request->filters) {
            $category->filters()->sync($request->filters);
        }

        return redirect()->back()->with('success', 'Category has been add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('id', $id)->first();

        if (!$category) {
            abort(404);
        }

        $categories = Category::where('parent_id', 0)
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $filters = Filter::where('parent_id', 0)
                ->orderBy('sort_order', 'asc')
                ->get();

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['link' => 'admin/categories', 'name' => 'Categories'],
            ['name' => 'Show']
        ];

        return view('admin.categories.show', compact('category', 'categories', 'filters', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('id', $id)->first();

        if (!$category) {
            abort(404);
        }

        $categories = Category::where('parent_id', 0)
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $filters = Filter::where('parent_id', 0)
                ->orderBy('sort_order', 'asc')
                ->get();

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['link' => 'admin/categories', 'name' => 'Categories'],
            ['name' => 'Edit']
        ];

        return view('admin.categories.edit', compact('category', 'categories', 'filters', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::where('id', $id)->first();

        if (!$category) {
            abort(404);
        }

        $english_id = $category->locale('en')->id;
        $thai_id = $category->locale('th')->id;

        $request->validate([
            'english_name' => 'required|different:thai_name',
            'english_slug' => 'required|alpha_dash|different:thai_slug|unique:category_locales,slug,'.$english_id,
            'english_meta_title' => 'required',
            'thai_name' => 'required|different:english_name',
            'thai_slug' => 'required|alpha_dash|different:english_slug|unique:category_locales,slug,'.$thai_id,
            'thai_meta_title' => 'required',
            'sort_order' => 'required'
        ]);

        $category->sort_order = $request->sort_order;

        if ($request->category != $category->parent_id) {
            if ($category->parent_id == 0) {
                foreach ($category->children as $key => $children) {
                    $children->parent_id = 0;
                    $children->save();
                }
            } else {
                foreach ($category->children as $key => $children) {
                    $children->parent_id = $category->parent->id;
                    $children->save();
                }
            }

            $category->parent_id = $request->category;
        }

        $category->save();

        $categoryLocale = $category->locale('en');
        $categoryLocale->name = $request->english_name;
        $categoryLocale->slug = $request->english_slug;
        $categoryLocale->meta_title = $request->english_meta_title;
        $categoryLocale->meta_keyword = $request->english_meta_keyword;
        $categoryLocale->meta_description = $request->english_meta_description;
        $categoryLocale->save();

        $categoryLocale = $category->locale('th');
        $categoryLocale->name = $request->thai_name;
        $categoryLocale->slug = $request->thai_slug;
        $categoryLocale->meta_title = $request->thai_meta_title;
        $categoryLocale->meta_keyword = $request->thai_meta_keyword;
        $categoryLocale->meta_description = $request->thai_meta_description;
        $categoryLocale->save();

        if ($request->filters != 'without') {
            $category->filters()->sync($request->filters);
        } else {
            $category->filters()->detach();
        }

        return redirect()->back()->with('success', 'Category has been update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('id', $id)->first();

        if (!$category) {
            abort(404);
        }

        if ($category->parent_id == 0) {
            foreach ($category->children as $key => $children) {
                $children->parent_id = 0;
                $children->save();
            }
        } else {
            foreach ($category->children as $key => $children) {
                $children->parent_id = $category->parent_id;
                $children->save();
            }
        }

        foreach ($category->categoryLocales as $key => $categoryLocale) {
            $categoryLocale->delete();
        }

        $category->filters()->detach();
        $category->products()->detach();

        $category->delete();

        return redirect()->back()->with('success', 'Category has been delete successfully.');
    }
}
