<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tag;
use App\Models\TagLocale;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags = Tag::join('tag_locales', 'tag_locales.tag_id', '=', 'tags.id')
                ->where('tag_locales.locale', 'en')
                ->where('tag_locales.name', 'like', '%'.$request->search_name.'%')
                ->orderBy('tags.id', 'desc')
                ->select('tags.*')
                ->paginate(15);

        $request->flash();

        $breadcrumbs = [
          ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
          ['name' => 'Tags']
        ];

        return view('admin.tags.index', compact('tags', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
          ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
          ['link' => 'admin/tags', 'name' => 'Tags'],
          ['name' => 'Create']
        ];

        return view('admin.tags.create', compact('breadcrumbs'));
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
            'english_name' => 'required|different:thai_name|unique:tag_locales,name',
            'english_slug' => 'required|alpha_dash|different:thai_slug|unique:tag_locales,slug',
            'english_meta_title' => 'required',
            'thai_name' => 'required|different:english_name|unique:tag_locales,name',
            'thai_slug' => 'required|alpha_dash|different:english_slug|unique:tag_locales,slug',
            'thai_meta_title' => 'required'
        ]);

        $tag = new Tag();
        $tag->save();

        $tagLocale = new TagLocale();
        $tagLocale->locale = 'en';
        $tagLocale->name = $request->english_name;
        $tagLocale->slug = $request->english_slug;
        $tagLocale->meta_title = $request->english_meta_title;
        $tagLocale->meta_keyword = $request->english_meta_keyword;
        $tagLocale->meta_description = $request->english_meta_description;
        $tagLocale->tag_id = $tag->id;
        $tagLocale->save();

        $tagLocale = new TagLocale();
        $tagLocale->locale = 'th';
        $tagLocale->name = $request->thai_name;
        $tagLocale->slug = $request->thai_slug;
        $tagLocale->meta_title = $request->thai_meta_title;
        $tagLocale->meta_keyword = $request->thai_meta_keyword;
        $tagLocale->meta_description = $request->thai_meta_description;
        $tagLocale->tag_id = $tag->id;
        $tagLocale->save();

        return redirect()->back()->with('success', 'Tag has been add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::where('id', $id)->first();

        if (!$tag) {
            abort(404);
        }

        $breadcrumbs = [
          ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
          ['link' => 'admin/tags', 'name' => 'Tags'],
          ['name' => 'Show']
        ];

        return view('admin.tags.show', compact('tag', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::where('id', $id)->first();

        if (!$tag) {
            abort(404);
        }

        $breadcrumbs = [
          ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
          ['link' => 'admin/tags', 'name' => 'Tags'],
          ['name' => 'Edit']
        ];

        return view('admin.tags.edit', compact('tag', 'breadcrumbs'));
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
        $tag = Tag::where('id', $id)->first();

        if (!$tag) {
            abort(404);
        }

        $english_id = $tag->locale('en')->id;
        $thai_id = $tag->locale('th')->id;

        $request->validate([
            'english_name' => 'required|different:thai_name|unique:tag_locales,name,'.$english_id,
            'english_slug' => 'required|alpha_dash|different:thai_slug|unique:tag_locales,slug,'.$english_id,
            'english_meta_title' => 'required',
            'thai_name' => 'required|different:english_name|unique:tag_locales,name,'.$thai_id,
            'thai_slug' => 'required|alpha_dash|different:english_slug|unique:tag_locales,slug,'.$thai_id,
            'thai_meta_title' => 'required'
        ]);

        $tagLocale = $tag->locale('en');
        $tagLocale->name = $request->english_name;
        $tagLocale->slug = $request->english_slug;
        $tagLocale->meta_title = $request->english_meta_title;
        $tagLocale->meta_keyword = $request->english_meta_keyword;
        $tagLocale->meta_description = $request->english_meta_description;
        $tagLocale->save();

        $tagLocale = $tag->locale('th');
        $tagLocale->name = $request->thai_name;
        $tagLocale->slug = $request->thai_slug;
        $tagLocale->meta_title = $request->thai_meta_title;
        $tagLocale->meta_keyword = $request->thai_meta_keyword;
        $tagLocale->meta_description = $request->thai_meta_description;
        $tagLocale->save();

        return redirect()->back()->with('success', 'Tag has been update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::where('id', $id)->first();

        if (!$tag) {
            abort(404);
        }

        foreach ($tag->tagLocales as $key => $tagLocale) {
            $tagLocale->delete();
        }

        $tag->articles()->detach();

        $tag->delete();

        return redirect()->back()->with('success', 'Tag has been delete successfully.');
    }
}
