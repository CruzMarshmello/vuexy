<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Facades\Storage;

use App\Models\Slideshow;
use App\Models\SlideshowLocale;

class SlideshowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $slideshows = Slideshow::join('slideshow_locales', 'slideshow_locales.slideshow_id', '=', 'slideshows.id')
                    ->where('slideshow_locales.locale', 'en')
                    ->where('slideshow_locales.title', 'like', '%'.$request->search_title.'%')
                    ->orderBy('slideshows.sort_order', 'asc')
                    ->select('slideshows.*')
                    ->paginate(15);

        $request->flash();

        $breadcrumbs = [
          ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
          ['name' => 'Slideshows']
        ];

        return view('admin.slideshows.index', compact('slideshows', 'breadcrumbs'));
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
          ['link' => 'admin/slideshows', 'name' => 'Slideshows'],
          ['name' => 'Create']
        ];

        return view('admin.slideshows.create', compact('breadcrumbs'));
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
            'english_title' => 'required',
            'english_url' => 'required|different:thai_url',
            'thai_title' => 'required',
            'thai_url' => 'required|different:english_url',
            'image' => 'required',
            'sort_order' => 'required|numeric'
        ]);

        $slideshow = new Slideshow();
        $slideshow->sort_order = $request->sort_order;
        $slideshow->status = $request->status;
        $slideshow->save();

        $file = $request->file('image');
        $rename = $slideshow->id.'-'.Str::random(8).'.jpg';
        $destination = 'slideshows/'.$rename;

        $image = Image::make($file)->fit(1280, 460);
        Storage::disk('public')->put($destination, $image->stream('jpg', 100));

        $slideshow->image = Storage::url($destination);
        $slideshow->save();

        $slideshowLocale = new SlideshowLocale();
        $slideshowLocale->locale = 'en';
        $slideshowLocale->title = $request->english_title;
        $slideshowLocale->url = $request->english_url;
        $slideshowLocale->description = $request->english_description;
        $slideshowLocale->slideshow_id = $slideshow->id;
        $slideshowLocale->save();

        $slideshowLocale = new SlideshowLocale();
        $slideshowLocale->locale = 'th';
        $slideshowLocale->title = $request->thai_title;
        $slideshowLocale->url = $request->thai_url;
        $slideshowLocale->description = $request->thai_description;
        $slideshowLocale->slideshow_id = $slideshow->id;
        $slideshowLocale->save();

        return redirect()->back()->with('success', 'Slideshow has been add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slideshow = Slideshow::where('id', $id)->first();

        if (!$slideshow) {
            abort(404);
        }

        $breadcrumbs = [
          ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
          ['link' => 'admin/slideshows', 'name' => 'Slideshows'],
          ['name' => 'Show']
        ];

        return view('admin.slideshows.show', compact('slideshow', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slideshow = Slideshow::where('id', $id)->first();

        if (!$slideshow) {
            abort(404);
        }

        $breadcrumbs = [
          ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
          ['link' => 'admin/slideshows', 'name' => 'Slideshows'],
          ['name' => 'Edit']
        ];

        return view('admin.slideshows.edit', compact('slideshow', 'breadcrumbs'));
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
        $slideshow = Slideshow::where('id', $id)->first();

        if (!$slideshow) {
            abort(404);
        }

        $request->validate([
            'english_title' => 'required',
            'english_url' => 'required|different:thai_url',
            'thai_title' => 'required',
            'thai_url' => 'required|different:english_url',
            'sort_order' => 'required|numeric'
        ]);

        $slideshow->sort_order = $request->sort_order;
        $slideshow->status = $request->status;

        $file = $request->file('image');

        if ($file) {
            Storage::disk('public')->delete(Str::replace('/storage', '', $slideshow->image));

            $rename = $slideshow->id.'-'.Str::random(8).'.jpg';
            $destination = 'slideshows/'.$rename;

            $image = Image::make($file)->fit(1280, 460);
            Storage::disk('public')->put($destination, $image->stream('jpg', 100));

            $slideshow->image = Storage::url($destination);
        }

        $slideshow->save();

        $slideshowLocale = $slideshow->locale('en');
        $slideshowLocale->title = $request->english_title;
        $slideshowLocale->url = $request->english_url;
        $slideshowLocale->description = $request->english_description;
        $slideshowLocale->save();

        $slideshowLocale = $slideshow->locale('th');
        $slideshowLocale->title = $request->thai_title;
        $slideshowLocale->url = $request->thai_url;
        $slideshowLocale->description = $request->thai_description;
        $slideshowLocale->save();

        return redirect()->back()->with('success', 'Slideshow has been update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slideshow = Slideshow::where('id', $id)->first();

        if (!$slideshow) {
            abort(404);
        }

        foreach ($slideshow->slideshowLocales as $key => $slideshowLocale) {
            $slideshowLocale->delete();
        }

        Storage::disk('public')->delete(Str::replace('/storage', '', $slideshow->image));

        $slideshow->delete();

        return redirect()->back()->with('success', 'Slideshow has been delete successfully.');
    }
}
