<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Information;
use App\Models\InformationLocale;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $information = Information::join('information_locales', 'information_locales.information_id', '=', 'information.id')
                    ->where('information_locales.locale', 'en')
                    ->where('information_locales.title', 'like', '%'.$request->search_title.'%')
                    ->orderBy('information.sort_order', 'asc')
                    ->select('information.*')
                    ->paginate(15);

        $request->flash();

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['name' => 'Information']
        ];

        return view('admin.information.index', compact('information', 'breadcrumbs'));
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
            ['link' => 'admin/information', 'name' => 'Information'],
            ['name' => 'Create']
        ];

        return view('admin.information.create', compact('breadcrumbs'));
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
            'english_title' => 'required|different:thai_title|unique:information_locales,title',
            'english_slug' => 'required|alpha_dash|different:thai_slug|unique:information_locales,slug',
            'english_meta_title' => 'required',
            'thai_title' => 'required|different:english_title|unique:information_locales,title',
            'thai_slug' => 'required|alpha_dash|different:english_slug|unique:information_locales,slug',
            'thai_meta_title' => 'required',
            'sort_order' => 'required|numeric|min:0'
        ]);

        $information = new Information();
        $information->sort_order = $request->sort_order;
        $information->status = $request->status;
        $information->save();

        $informationLocale = new InformationLocale();
        $informationLocale->locale = 'en';
        $informationLocale->title = $request->english_title;
        $informationLocale->slug = $request->english_slug;
        $informationLocale->description = $request->english_description;
        $informationLocale->meta_title = $request->english_meta_title;
        $informationLocale->meta_keyword = $request->english_meta_keyword;
        $informationLocale->meta_description = $request->english_meta_description;
        $informationLocale->information_id = $information->id;
        $informationLocale->save();

        $informationLocale = new InformationLocale();
        $informationLocale->locale = 'th';
        $informationLocale->title = $request->thai_title;
        $informationLocale->slug = $request->thai_slug;
        $informationLocale->description = $request->thai_description;
        $informationLocale->meta_title = $request->thai_meta_title;
        $informationLocale->meta_keyword = $request->thai_meta_keyword;
        $informationLocale->meta_description = $request->thai_meta_description;
        $informationLocale->information_id = $information->id;
        $informationLocale->save();

        return redirect()->back()->with('success', 'Information has been add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $information = Information::where('id', $id)->first();

        if (!$information) {
            abort(404);
        }

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['link' => 'admin/information', 'name' => 'Information'],
            ['name' => 'Show']
        ];

        return view('admin.information.show', compact('information', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $information = Information::where('id', $id)->first();

        if (!$information) {
            abort(404);
        }

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['link' => 'admin/information', 'name' => 'Information'],
            ['name' => 'Edit']
        ];

        return view('admin.information.edit', compact('information', 'breadcrumbs'));
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
        $information = Information::where('id', $id)->first();

        if (!$information) {
            abort(404);
        }

        $englishId = $information->locale('en')->id;
        $thaiId = $information->locale('th')->id;

        $request->validate([
            'english_title' => 'required|different:thai_title|unique:information_locales,title,'.$englishId,
            'english_slug' => 'required|alpha_dash|different:thai_slug|unique:information_locales,slug,'.$englishId,
            'english_meta_title' => 'required',
            'thai_title' => 'required|different:english_title|unique:information_locales,title,'.$thaiId,
            'thai_slug' => 'required|alpha_dash|different:english_slug|unique:information_locales,slug,'.$thaiId,
            'thai_meta_title' => 'required',
            'sort_order' => 'required|numeric|min:0'
        ]);

        $information->sort_order = $request->sort_order;
        $information->status = $request->status;
        $information->save();

        $informationLocale = $information->locale('en');
        $informationLocale->title = $request->english_title;
        $informationLocale->slug = $request->english_slug;
        $informationLocale->description = $request->english_description;
        $informationLocale->meta_title = $request->english_meta_title;
        $informationLocale->meta_keyword = $request->english_meta_keyword;
        $informationLocale->meta_description = $request->english_meta_description;
        $informationLocale->save();

        $informationLocale = $information->locale('th');
        $informationLocale->title = $request->thai_title;
        $informationLocale->slug = $request->thai_slug;
        $informationLocale->description = $request->thai_description;
        $informationLocale->meta_title = $request->thai_meta_title;
        $informationLocale->meta_keyword = $request->thai_meta_keyword;
        $informationLocale->meta_description = $request->thai_meta_description;
        $informationLocale->save();

        return redirect()->back()->with('success', 'Information has been update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Information::where('id', $id)->first();

        if (!$information) {
            abort(404);
        }

        foreach ($information->informationLocales as $key => $informationLocale) {
            $informationLocale->delete();
        }

        $information->delete();

        return redirect()->back()->with('success', 'Information has been delete successfully.');
    }
}
