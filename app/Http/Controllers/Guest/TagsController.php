<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Models\Tag;
use App\Models\Blog;

use App\Models\Category;
use App\Models\Information;
use App\Models\ContactUs;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $tag = Tag::join('tag_locales', 'tag_locales.tag_id', '=', 'tags.id')
            ->where('tag_locales.slug', $slug)
            ->select('tags.*')
            ->first();

        if (!$tag) {
            abort(404);
        }

        $categoryLinks = Category::where('parent_id', 0)
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $informationLinks = Information::where('status', 'Enabled')
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $contactUsLink = ContactUs::where('id', 1)->first();

        $breadcrumbs = [
            ['link' => '/', 'name' => __('tag.home')],
            ['name' => __('tag.tags').' '.__('tag.result').' '.$tag->locale(session()->get('locale'))->name]
        ];

        return view('guest.tags.show', compact('tag', 'categoryLinks', 'informationLinks', 'contactUsLink', 'breadcrumbs'));
    }

    public function loadMore($slug)
    {
        $blogs = Blog::join('tag_blog', 'tag_blog.blog_id', '=', 'blogs.id')
                ->join('tags', 'tags.id', '=', 'tag_blog.tag_id')
                ->join('tag_locales', 'tag_locales.tag_id', '=', 'tags.id')
                ->where('tag_locales.slug', $slug)
                ->where('blogs.status', 'Enabled')
                ->orderBy('blogs.id', 'desc')
                ->select('blogs.*')
                ->paginate(6);

        $output = '';
        foreach ($blogs as $key => $blog) {
            $tags = '';
            foreach ($blog->tags as $key => $tag) {
                $tags .= '<a class="badge badge-pill badge-light-primary mr-50" href="'.route('guest.tags.show', ['slug' => $tag->locale(session()->get('locale'))->slug]).'">
                        '.$tag->locale(session()->get('locale'))->name.'
                        </a>';
            }

            $output .= '<div class="col-md-6 col-lg-4">
                        <div class="card blog">
                        <img class="card-img-top" src="'.$blog->image.'" alt="Card image cap" />
                        <div class="card-body">
                        <h4 class="card-title">'.$blog->locale(session()->get('locale'))->title.'</h4>
                        <p class="card-text">'.$tags.'</p>
                        <p class="card-text">'.Str::limit($blog->locale(session()->get('locale'))->introduction, 200).'</p>
                        <p class="card-text text-muted small">'.__('tag.last updated').' '.$blog->updated_at->diffForHumans().'</p>
                        <a href="'.route('guest.blogs.show', ['slug' => $blog->locale(session()->get('locale'))->slug]).'" class="btn btn-primary">
                        '.__('tag.read more').'
                        </a>
                        </div>
                        </div>
                        </div>';
        }

        $loadMore = '';
        if (count($blogs) > 0) {
            if ($blogs->currentPage() < $blogs->lastPage()) {
                $page = $blogs->currentPage()+1;

                $loadMore = '<blockquote class="blockquote text-center">
                            <button type="button" class="btn btn-lg btn-icon btn-icon rounded-circle btn-primary" data-page="'.$page.'">
                            <i data-feather="chevrons-down"></i>
                            </button>
                            </blockquote>';
            }
        } else {
            $loadMore = '<blockquote class="blockquote text-center">
                        <p class="mb-0">'.__('tag.not find').'</p>
                        <footer class="blockquote-footer"><cite title="Source Title">'.env('APP_URL').'</cite></footer>
                        </blockquote>';
        }

        return response()->json(['output' => $output, 'loadMore' => $loadMore]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
