<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Mail;
use App\Mail\Verify;

use App\Models\User;
use App\Models\Subscribe;
use App\Models\AddressBook;
use App\Models\UserVerify;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::where('full_name', 'like', '%'.$request->search_full_name.'%')
            ->where('role', 'User')
            ->paginate(15);

        $request->flash();

        $breadcrumbs = [
          ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
          ['name' => 'Customers']
        ];

        return view('admin.customers.index', compact('users', 'breadcrumbs'));
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
          ['link' => 'admin/customers', 'name' => 'Customers'],
          ['name' => 'Create']
        ];

        return view('admin.customers.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->address_books) {
            $request->validate([
                'full_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/|confirmed',
                'password_confirmation' => 'required',
            ]);
        } else {
            $request->validate([
                'full_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/|confirmed',
                'password_confirmation' => 'required',
                'address_books.*.location' => 'required',
                'address_books.*.full_name' => 'required',
                'address_books.*.address_1' => 'required',
                'address_books.*.sub_district' => 'required',
                'address_books.*.district' => 'required',
                'address_books.*.province' => 'required',
                'address_books.*.postal_code' => 'required',
                'address_books.*.country' => 'required',
                'address_books.*.telephone' => 'required'
            ]);
        }

        $user = new User();
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'User';
        $user->status = $request->status;
        $user->save();

        if ($request->address_books) {
            foreach ($request->address_books as $key => $array) {
                $addressBook = new AddressBook();
                $addressBook->location = $array['location'];
                $addressBook->full_name = $array['full_name'];
                $addressBook->address_1 = $array['address_1'];
                $addressBook->address_2 = $array['address_2'];
                $addressBook->sub_district = $array['sub_district'];
                $addressBook->district = $array['district'];
                $addressBook->province = $array['province'];
                $addressBook->postal_code = $array['postal_code'];
                $addressBook->country = $array['country'];
                $addressBook->telephone = $array['telephone'];
                $addressBook->user_id = $user->id;
                $addressBook->save();
            }
        }

        $subscribe = Subscribe::where('email', $request->email)->first();
        if ($subscribe) {
            $subscribe->user_id = $user->id;
            $subscribe->save();
        } else {
            $subscribe = new Subscribe();
            $subscribe->email = $request->email;
            $subscribe->status = 'Enabled';
            $subscribe->user_id = $user->id;
            $subscribe->save();
        }

        $userVerify = new UserVerify();
        $userVerify->token = Str::random(40);
        $userVerify->user_id = $user->id;
        $userVerify->save();

        $details = [
            'full_name' => $user->full_name,
            'link' => 'verify/'.$userVerify->token.'/'.$userVerify->user_id
        ];

        Mail::to($user->email)->send(new Verify($details));

        return redirect()->back()->with('success', 'Customer has been add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)
                ->where('role', 'User')
                ->first();

        if (!$user) {
            abort(404);
        }

        $breadcrumbs = [
          ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
          ['link' => 'admin/customers', 'name' => 'Customers'],
          ['name' => 'Show']
        ];

        return view('admin.customers.show', compact('user', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)
                ->where('role', 'User')
                ->first();

        if (!$user) {
            abort(404);
        }

        $breadcrumbs = [
          ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
          ['link' => 'admin/customers', 'name' => 'Customers'],
          ['name' => 'Edit']
        ];

        return view('admin.customers.edit', compact('user', 'breadcrumbs'));
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
        $user = User::where('id', $id)->first();

        if (!$user) {
            abort(404);
        }

        if ($request->password || $request->password_confirmation) {
            if ($request->address_books && is_array($request->address_books)) {
                $request->validate([
                    'full_name' => 'required',
                    'email' => 'required|email|unique:users,email,'.$user->id,
                    'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/|confirmed',
                    'password_confirmation' => 'required',
                    'address_books.*.location' => 'required',
                    'address_books.*.full_name' => 'required',
                    'address_books.*.address_1' => 'required',
                    'address_books.*.sub_district' => 'required',
                    'address_books.*.district' => 'required',
                    'address_books.*.province' => 'required',
                    'address_books.*.postal_code' => 'required',
                    'address_books.*.country' => 'required',
                    'address_books.*.telephone' => 'required'
                ]);
            } else {
                $request->validate([
                    'full_name' => 'required',
                    'email' => 'required|email|unique:users,email,'.$user->id,
                    'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/|confirmed',
                    'password_confirmation' => 'required'
                ]);
            }
        } else {
            if ($request->address_books && is_array($request->address_books)) {
                $request->validate([
                    'full_name' => 'required',
                    'email' => 'required|email|unique:users,email,'.$user->id,
                    'address_books.*.location' => 'required',
                    'address_books.*.full_name' => 'required',
                    'address_books.*.address_1' => 'required',
                    'address_books.*.sub_district' => 'required',
                    'address_books.*.district' => 'required',
                    'address_books.*.province' => 'required',
                    'address_books.*.postal_code' => 'required',
                    'address_books.*.country' => 'required',
                    'address_books.*.telephone' => 'required'
                ]);
            } else {
                $request->validate([
                    'full_name' => 'required',
                    'email' => 'required|email|unique:users,email,'.$user->id
                ]);
            }
        }

        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->status = $request->status;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $id = [];
        if ($request->address_books && is_array($request->address_books)) {
            foreach ($request->address_books as $key => $array) {
                if ($array['id']) {
                    $addressBook = AddressBook::where('id', $array['id'])->first();
                    $addressBook->location = $array['location'];
                    $addressBook->full_name = $array['full_name'];
                    $addressBook->address_1 = $array['address_1'];
                    $addressBook->address_2 = $array['address_2'];
                    $addressBook->sub_district = $array['sub_district'];
                    $addressBook->district = $array['district'];
                    $addressBook->province = $array['province'];
                    $addressBook->postal_code = $array['postal_code'];
                    $addressBook->country = $array['country'];
                    $addressBook->telephone = $array['telephone'];
                    $addressBook->save();
                } else {
                    $addressBook = new AddressBook();
                    $addressBook->location = $array['location'];
                    $addressBook->full_name = $array['full_name'];
                    $addressBook->address_1 = $array['address_1'];
                    $addressBook->address_2 = $array['address_2'];
                    $addressBook->sub_district = $array['sub_district'];
                    $addressBook->district = $array['district'];
                    $addressBook->province = $array['province'];
                    $addressBook->postal_code = $array['postal_code'];
                    $addressBook->country = $array['country'];
                    $addressBook->telephone = $array['telephone'];
                    $addressBook->user_id = $user->id;
                    $addressBook->save();
                }

                $id[] = $addressBook->id;
            }

            $addressBooks = AddressBook::whereNotIn('id', $id)
                        ->where('user_id', $user->id)
                        ->get();

            foreach ($addressBooks as $key => $addressBook) {
                $addressBook->delete();
            }
        } else {
            foreach ($user->addressBooks as $key => $addressBook) {
                $addressBook->delete();
            }
        }

        return redirect()->back()->with('success', 'Customer has been update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        if (!$user) {
            abort(404);
        }

        foreach ($user->addressBooks as $key => $addressBook) {
            $addressBook->delete();
        }

        foreach ($user->orders as $key => $order) {
            $order->user_id = null;
            $order->save();
        }

        $user->userVerify->delete();
        $user->subscribe->delete();
        $user->delete();

        return redirect()->back()->with('success', 'Customer has been delete successfully.');
    }
}
