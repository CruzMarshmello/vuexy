<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Facades\Storage;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\BlogLocale;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blogs = Blog::join('blog_locales', 'blog_locales.blog_id', '=', 'blogs.id')
                    ->where('blog_locales.locale', 'en')
                    ->where('blog_locales.title', 'like', '%'.$request->search_title.'%')
                    ->orderBy('blogs.id', 'desc')
                    ->select('blogs.*')
                    ->paginate(15);

        $request->flash();

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['name' => 'Blogs']
        ];

        return view('admin.blogs.index', compact('blogs', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::get();

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['link' => 'admin/blogs', 'name' => 'Blogs'],
            ['name' => 'Create']
        ];

        return view('admin.blogs.create', compact('tags', 'breadcrumbs'));
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
            'english_title' => 'required|different:thai_title|unique:blog_locales,title',
            'english_slug' => 'required|alpha_dash|different:thai_slug|unique:blog_locales,slug',
            'english_meta_title' => 'required',
            'thai_title' => 'required|different:english_title|unique:blog_locales,title',
            'thai_slug' => 'required|alpha_dash|different:english_slug|unique:blog_locales,slug',
            'thai_meta_title' => 'required',
            'image' => 'required'
        ]);

        $blog = new Blog();
        $blog->status = $request->status;
        $blog->save();

        $file = $request->file('image');
        $rename = $blog->id.'-'.Str::random(8).'.jpg';
        $destination = 'blogs/'.$rename;

        $image = Image::make($file)->fit(1200, 628);
        Storage::disk('public')->put($destination, $image->stream('jpg', 100));

        $blog->image = Storage::url($destination);
        $blog->save();

        $blogLocale = new BlogLocale();
        $blogLocale->locale = 'en';
        $blogLocale->title = $request->english_title;
        $blogLocale->slug = $request->english_slug;
        $blogLocale->introduction = $request->english_introduction;
        $blogLocale->description = $request->english_description;
        $blogLocale->meta_title = $request->english_meta_title;
        $blogLocale->meta_keyword = $request->english_meta_keyword;
        $blogLocale->meta_description = $request->english_meta_description;
        $blogLocale->blog_id = $blog->id;
        $blogLocale->save();

        $blogLocale = new BlogLocale();
        $blogLocale->locale = 'th';
        $blogLocale->title = $request->thai_title;
        $blogLocale->slug = $request->thai_slug;
        $blogLocale->introduction = $request->thai_introduction;
        $blogLocale->description = $request->thai_description;
        $blogLocale->meta_title = $request->thai_meta_title;
        $blogLocale->meta_keyword = $request->thai_meta_keyword;
        $blogLocale->meta_description = $request->thai_meta_description;
        $blogLocale->blog_id = $blog->id;
        $blogLocale->save();

        if ($request->tags) {
            $blog->tags()->sync($request->tags);
        }

        return redirect()->back()->with('success', 'Blog has been add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::where('id', $id)->first();

        if (!$blog) {
            abort(404);
        }

        $tags = Tag::get();

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['link' => 'admin/blogs', 'name' => 'Blogs'],
            ['name' => 'Show']
        ];

        return view('admin.blogs.show', compact('blog', 'tags', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::where('id', $id)->first();

        if (!$blog) {
            abort(404);
        }

        $tags = Tag::get();

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['link' => 'admin/blogs', 'name' => 'Blogs'],
            ['name' => 'Edit']
        ];

        return view('admin.blogs.edit', compact('blog', 'tags', 'breadcrumbs'));
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
        $blog = Blog::where('id', $id)->first();

        if (!$blog) {
            abort(404);
        }

        $englishId = $blog->locale('en')->id;
        $thaiId = $blog->locale('th')->id;

        $request->validate([
            'english_title' => 'required|different:thai_title|unique:blog_locales,title,'.$englishId,
            'english_slug' => 'required|alpha_dash|different:thai_slug|unique:blog_locales,slug,'.$englishId,
            'english_meta_title' => 'required',
            'thai_title' => 'required|different:english_title|unique:blog_locales,title,'.$thaiId,
            'thai_slug' => 'required|alpha_dash|different:english_slug|unique:blog_locales,slug,'.$thaiId,
            'thai_meta_title' => 'required',
        ]);

        $blog->status = $request->status;

        $file = $request->file('image');
        if ($file) {
            Storage::disk('public')->delete(Str::replace('/storage/', '', $blog->image));

            $rename = $blog->id.'-'.Str::random(8).'.jpg';
            $destination = 'blogs/'.$rename;

            $image = Image::make($file)->fit(1200, 628);
            Storage::disk('public')->put($destination, $image->stream('jpg', 100));

            $blog->image = Storage::url($destination);
        }

        $blog->save();

        $blogLocale = $blog->locale('en');
        $blogLocale->title = $request->english_title;
        $blogLocale->slug = $request->english_slug;
        $blogLocale->introduction = $request->english_introduction;
        $blogLocale->description = $request->english_description;
        $blogLocale->meta_title = $request->english_meta_title;
        $blogLocale->meta_keyword = $request->english_meta_keyword;
        $blogLocale->meta_description = $request->english_meta_description;
        $blogLocale->save();

        $blogLocale = $blog->locale('th');
        $blogLocale->title = $request->thai_title;
        $blogLocale->slug = $request->thai_slug;
        $blogLocale->introduction = $request->thai_introduction;
        $blogLocale->description = $request->thai_description;
        $blogLocale->meta_title = $request->thai_meta_title;
        $blogLocale->meta_keyword = $request->thai_meta_keyword;
        $blogLocale->meta_description = $request->thai_meta_description;
        $blogLocale->save();

        if ($request->tags) {
            $blog->tags()->sync($request->tags);
        } else {
            $blog->tags()->detach();
        }

        return redirect()->back()->with('success', 'Blog has been update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::where('id', $id)->first();

        if (!$blog) {
            abort(404);
        }

        foreach ($blog->blogLocales as $key => $blogLocale) {
            $blogLocale->delete();
        }

        Storage::disk('public')->delete(Str::replace('/storage/', '', $blog->image));

        $blog->tags()->detach();

        $blog->delete();

        return redirect()->back()->with('success', 'Blog has been delete successfully.');
    }
}
