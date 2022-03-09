<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ContactUs;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactUs = ContactUs::where('id', 1)->first();

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['name' => 'Contact Us']
        ];

        return view('admin.contactUs.index', compact('contactUs', 'breadcrumbs'));
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
    public function show($id)
    {
        $contactUs = ContactUs::where('id', $id)->first();

        if (!$contactUs) {
            abort(404);
        }

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['link' => 'admin/contact-us', 'name' => 'Contact Us'],
            ['name' => 'Show']
        ];

        return view('admin.contactUs.show', compact('contactUs', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contactUs = ContactUs::where('id', $id)->first();

        if (!$contactUs) {
            abort(404);
        }

        $breadcrumbs = [
            ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
            ['link' => 'admin/contact-us', 'name' => 'Contact Us'],
            ['name' => 'Edit']
        ];

        return view('admin.contactUs.edit', compact('contactUs', 'breadcrumbs'));
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
        $contactUs = ContactUs::where('id', $id)->first();

        if (!$contactUs) {
            abort(404);
        }

        $request->validate([
            'english_company' => 'required',
            'english_address' => 'required',
            'thai_company' => 'required',
            'thai_address' => 'required'
        ]);

        $contactUs->facebook = $request->facebook;
        $contactUs->instagram = $request->instagram;
        $contactUs->twitter = $request->twitter;
        $contactUs->youtube = $request->youtube;
        $contactUs->telephone = $request->telephone;
        $contactUs->fax = $request->fax;
        $contactUs->save();

        $contactUsLocale = $contactUs->locale('en');
        $contactUsLocale->company = $request->english_company;
        $contactUsLocale->address = $request->english_address;
        $contactUsLocale->save();

        $contactUsLocale = $contactUs->locale('th');
        $contactUsLocale->company = $request->thai_company;
        $contactUsLocale->address = $request->thai_address;
        $contactUsLocale->save();

        return redirect()->back()->with('success', 'Contact us has been update successfully.');
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
