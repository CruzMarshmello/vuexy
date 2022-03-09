<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Information;

use App\Models\Category;
use App\Models\ContactUs;

class InformationController extends Controller
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
        $information = Information::join('information_locales', 'information_locales.information_id', '=', 'information.id')
                    ->where('information_locales.slug', $slug)
                    ->where('status', 'Enabled')
                    ->select('information.*')
                    ->first();

        if (!$information) {
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
            ['link' => '/', 'name' => __('information.home')],
            ['name' => $information->locale(session()->get('locale'))->title]
        ];

        return view('guest.information.show', compact('information', 'categoryLinks', 'informationLinks', 'contactUsLink', 'breadcrumbs'));
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
