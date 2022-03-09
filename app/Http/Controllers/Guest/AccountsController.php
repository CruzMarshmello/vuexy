<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Information;
use App\Models\ContactUs;

use App\Models\User;
use App\Models\AddressBook;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryLinks = Category::where('parent_id', 0)
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $informationLinks = Information::where('status', 'Enabled')
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $contactUsLink = ContactUs::where('id', 1)->first();

        $breadcrumbs = [
            ['link' => '/', 'name' => __('account.home')],
            ['name' => __('account.my account')]
        ];

        return view('guest.accounts.index', compact('categoryLinks', 'informationLinks', 'contactUsLink', 'breadcrumbs'));
    }

    public function editProfile()
    {
        $categoryLinks = Category::where('parent_id', 0)
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $informationLinks = Information::where('status', 'Enabled')
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $contactUsLink = ContactUs::where('id', 1)->first();

        $breadcrumbs = [
            ['link' => '/', 'name' => __('account.home')],
            ['link' => '/accounts', 'name' => __('account.my account')],
            ['name' => __('account.profile')]
        ];

        return view('guest.accounts.editProfile', compact('categoryLinks', 'informationLinks', 'contactUsLink', 'breadcrumbs'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();

        if (!$user) {
            abort(404);
        }

        if ($request->password || $request->password_confirmation) {
            $request->validate([
                'full_name' => 'required',
                'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/|confirmed',
                'password_confirmation' => 'required'
            ]);
        } else {
            $request->validate([
                'full_name' => 'required'
            ]);
        }

        $user->full_name = $request->full_name;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $user->subscribe->status = $request->subscribe;
        $user->subscribe->save();

        return redirect()->back()->with('success', __('account.update profile successfully'));
    }

    public function createAddressBook()
    {
        $categoryLinks = Category::where('parent_id', 0)
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $informationLinks = Information::where('status', 'Enabled')
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $contactUsLink = ContactUs::where('id', 1)->first();

        $breadcrumbs = [
            ['link' => '/', 'name' => __('account.home')],
            ['link' => '/accounts', 'name' => __('account.my account')],
            ['name' => __('account.create address')]
        ];

        return view('guest.accounts.createAddressBook', compact('categoryLinks', 'informationLinks', 'contactUsLink', 'breadcrumbs'));
    }

    public function storeAddressBook(Request $request)
    {
        $request->validate([
            'location' => 'required',
            'full_name' => 'required',
            'address_1' => 'required',
            'sub_district' => 'required',
            'district' => 'required',
            'province' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
            'telephone' => 'required'
        ]);

        $addressBook = new AddressBook();
        $addressBook->location = $request->location;
        $addressBook->full_name = $request->full_name;
        $addressBook->address_1 = $request->address_1;
        $addressBook->address_2 = $request->address_2;
        $addressBook->sub_district = $request->sub_district;
        $addressBook->district = $request->district;
        $addressBook->province = $request->province;
        $addressBook->postal_code = $request->postal_code;
        $addressBook->country = $request->country;
        $addressBook->telephone = $request->telephone;
        $addressBook->user_id = Auth::user()->id;
        $addressBook->save();

        return redirect()->back()->with('success', __('account.add address successfully'));
    }

    public function editAddressBook($id)
    {
        $addressBook = AddressBook::where('id', $id)
                    ->where('user_id', Auth::user()->id)
                    ->first();

        if (!$addressBook) {
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
            ['link' => '/', 'name' => __('account.home')],
            ['link' => '/accounts', 'name' => __('account.my account')],
            ['name' => __('account.edit address')]
        ];

        return view('guest.accounts.editAddressBook', compact('addressBook', 'categoryLinks', 'informationLinks', 'contactUsLink', 'breadcrumbs'));
    }

    public function updateAddressBook(Request $request, $id)
    {
        $addressBook = AddressBook::where('id', $id)
                    ->where('user_id', Auth::user()->id)
                    ->first();

        if (!$addressBook) {
            abort(404);
        }

        $request->validate([
            'location' => 'required',
            'full_name' => 'required',
            'address_1' => 'required',
            'sub_district' => 'required',
            'district' => 'required',
            'province' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
            'telephone' => 'required'
        ]);

        $addressBook->location = $request->location;
        $addressBook->full_name = $request->full_name;
        $addressBook->address_1 = $request->address_1;
        $addressBook->address_2 = $request->address_2;
        $addressBook->sub_district = $request->sub_district;
        $addressBook->district = $request->district;
        $addressBook->province = $request->province;
        $addressBook->postal_code = $request->postal_code;
        $addressBook->country = $request->country;
        $addressBook->telephone = $request->telephone;
        $addressBook->save();

        return redirect()->back()->with('success', __('account.update address successfully'));
    }

    public function destroyAddressBook($id)
    {
        $addressBook = AddressBook::where('id', $id)
                    ->where('user_id', Auth::user()->id)
                    ->first();

        if (!$addressBook) {
            abort(404);
        }

        $addressBook->delete();

        return redirect()->back()->with('success', __('account.delete address successfully'));
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
        //
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
