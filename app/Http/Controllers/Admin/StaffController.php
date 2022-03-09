<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Facades\Storage;

use Mail;
use App\Mail\Verify;

use App\Models\User;
use App\Models\Module;
use App\Models\Permission;
use App\Models\UserVerify;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::where('full_name', 'like', '%'.$request->search_full_name.'%')
                ->where('email', '!=', env('MAIL_USERNAME'))
                ->where('role', 'Admin')
                ->paginate(15);

        $request->flash();

        $breadcrumbs = [
          ['link' => 'admin/dashboards', 'name' => 'Dashboards'],
          ['name' => 'Staff']
        ];

        return view('admin.staff.index', compact('users', 'breadcrumbs'));
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
          ['link' => 'admin/staff','name' => 'Staff'],
          ['name' => 'Create']
        ];

        $modules = Module::where('name', '!=', 'Dashboards')->get();

        return view('admin.staff.create', compact('breadcrumbs', 'modules'));
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
            'full_name' => 'required|unique:users,full_name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/|confirmed',
            'password_confirmation' => 'required',
            'permissions' => 'required'
        ]);

        $user = new User();
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'Admin';
        $user->status = $request->status;
        $user->save();

        $file = $request->file('profile_picture');
        if ($file) {
            $rename = $user->id.'-'.Str::random(8).'.jpg';
            $destination = 'users/'.$rename;

            $image = Image::make($file)->fit(320);
            Storage::disk('public')->put($destination, $image->stream('jpg', 100));

            $user->profile_picture = Storage::url($destination);
            $user->save();
        }

        $array = ['create dashboards', 'read dashboards', 'update dashboards', 'delete dashboards'];
        foreach ($array as $key => $value) {
            $permissions[] = Permission::where('name', $value)->first()->id;
        }

        foreach ($request->permissions as $key => $permission) {
            $permissions[] = Permission::where('name', $permission)->first()->id;
        }

        $user->permissions()->sync($permissions);

        $userVerify = new UserVerify();
        $userVerify->token = Str::random(40);
        $userVerify->user_id = $user->id;
        $userVerify->save();

        $details = [
            'full_name' => $user->full_name,
            'link' => 'admin/verify/'.$userVerify->token.'/'.$userVerify->user_id
        ];

        Mail::to($user->email)->send(new Verify($details));

        return redirect()->back()->with('success', 'Staff has been add successfully.');
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
                ->where('email', '!=', env('MAIL_USERNAME'))
                ->where('role', 'Admin')
                ->first();

        if (!$user) {
            abort(404);
        }

        $breadcrumbs = [
            ['link' => 'admin/dashboards','name' => 'Dashboards'],
            ['link' => 'admin/staff','name' => 'Staff'],
            ['name' => 'Show']
        ];

        $modules = Module::where('name', '!=', 'Dashboards')->get();

        return view('admin.staff.show', compact('user', 'breadcrumbs', 'modules'));
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
                ->where('email', '!=', env('MAIL_USERNAME'))
                ->where('role', 'Admin')
                ->first();

        if (!$user) {
            abort(404);
        }

        $breadcrumbs = [
            ['link' => 'admin/dashboards','name' => 'Dashboards'],
            ['link' => 'admin/staff','name' => 'Staff'],
            ['name' => 'Edit']
        ];

        $modules = Module::where('name', '!=', 'Dashboards')->get();

        return view('admin.staff.edit', compact('user', 'breadcrumbs', 'modules'));
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
            $request->validate([
                'full_name' => 'required|unique:users,full_name,'.$id,
                'email' => 'required|email|unique:users,email,'.$id,
                'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/|confirmed',
                'password_confirmation' => 'required',
                'permissions' => 'required'
            ]);
        } else {
            $request->validate([
                'full_name' => 'required|unique:users,full_name,'.$id,
                'email' => 'required|email|unique:users,email,'.$id,
                'permissions' => 'required'
            ]);
        }

        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->status = $request->status;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $file = $request->file('profile_picture');
        if ($file) {
            Storage::disk('public')->delete(Str::replace('/storage', '', $user->profile_picture));

            $rename = $user->id.'-'.Str::random(8).'.jpg';
            $destination = 'users/'.$rename;

            $image = Image::make($file)->fit(320);
            Storage::disk('public')->put($destination, $image->stream('jpg', 100));

            $user->profile_picture = Storage::url($destination);
        }

        $user->save();

        $array = ['create dashboards', 'read dashboards', 'update dashboards', 'delete dashboards'];
        foreach ($array as $key => $value) {
            $permissions[] = Permission::where('name', $value)->first()->id;
        }

        foreach ($request->permissions as $key => $permission) {
            $permissions[] = Permission::where('name', $permission)->first()->id;
        }

        $user->permissions()->sync($permissions);

        return redirect()->back()->with('success', 'Staff has been update successfully.');
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

        Storage::disk('public')->delete(Str::replace('/storage', '', $user->profile_picture));

        $user->permissions()->detach();

        $user->userVerify->delete();

        $user->delete();

        return redirect()->back()->with('success', 'Staff has been delete successfully.');
    }
}
