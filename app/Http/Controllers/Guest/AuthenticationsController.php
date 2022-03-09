<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Mail;
use App\Mail\Verify;
use App\Mail\ResetPassword;

use App\Models\Category;
use App\Models\Information;
use App\Models\ContactUs;

use App\Models\User;
use App\Models\Subscribe;
use App\Models\Order;
use App\Models\UserVerify;
use App\Models\PasswordReset;

class AuthenticationsController extends Controller
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
            ['link' => '/', 'name' => __('authentication.home')],
            ['name' => __('authentication.sign in')]
        ];

        return view('guest.authentications.index', compact('categoryLinks', 'informationLinks', 'contactUsLink', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryLinks = Category::where('parent_id', 0)
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $informationLinks = Information::where('status', 'Enabled')
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $contactUsLink = ContactUs::where('id', 1)->first();

        $breadcrumbs = [
            ['link' => '/', 'name' => __('authentication.home')],
            ['link' => '/sign-in', 'name' => __('authentication.sign in')],
            ['name' => __('authentication.register')]
        ];

        $termsAndConditions = Information::where('id', 1)->first();

        return view('guest.authentications.create', compact('categoryLinks', 'informationLinks', 'contactUsLink', 'breadcrumbs', 'termsAndConditions'));
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
            'full_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/|confirmed',
            'password_confirmation' => 'required',
            'agreed' => 'required'
        ]);

        $user = new User();
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'User';
        $user->status = 'Active';
        $user->save();

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

        $orders = Order::where('email', $request->email)->get();
        foreach ($orders as $key => $order) {
            $order->user_id = $user->id;
            $order->save();
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

        return redirect()->route('guest.authentications.index')->with('warning', __('authentication.verify your email'));
    }

    public function verify($token, $user_id)
    {
        $userVerify = UserVerify::where('token', $token)
                    ->where('user_id', $user_id)
                    ->first();

        if (!$userVerify) {
            abort(404);
        }

        if (!$userVerify->user->email_verified_at) {
            $userVerify->user->email_verified_at = Carbon::now();
            $userVerify->user->save();

            return redirect()->route('guest.authentications.index')->with(['success' => __('authentication.thank verify')]);
        }

        return redirect()->route('guest.authentications.index')->with(['success' => __('authentication.already verified')]);
    }

    public function signIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'User'])) {
            if (!Auth::user()->email_verified_at) {
                Auth::logout();
                return redirect()->back()->with(['warning' => __('authentication.not verified')]);
            } elseif (Auth::user()->status == 'Blocked') {
                Auth::logout();
                return redirect()->back()->with(['error' => __('authentication.blocked')]);
            } elseif (Auth::user()->status == 'Deactivated') {
                Auth::logout();
                return redirect()->back()->with(['warning' => __('authentication.deactivated')]);
            }

            return redirect()->route('guest.homes.index');
        }

        return redirect()->back()->with(['error' => __('authentication.incorrect')]);
    }

    public function signOut()
    {
        Auth::logout();

        return redirect()->route('guest.homes.index');
    }

    public function forgotPassword()
    {
        $categoryLinks = Category::where('parent_id', 0)
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $informationLinks = Information::where('status', 'Enabled')
                    ->orderBy('sort_order', 'asc')
                    ->get();

        $contactUsLink = ContactUs::where('id', 1)->first();

        $breadcrumbs = [
            ['link' => '/', 'name' => __('authentication.home')],
            ['link' => '/sign-in', 'name' => __('authentication.sign in')],
            ['name' => __('authentication.forgot password')]
        ];

        return view('guest.authentications.forgotPassword', compact('categoryLinks', 'informationLinks', 'contactUsLink', 'breadcrumbs'));
    }

    public function sendLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)
                ->where('role', 'User')
                ->first();

        if (!$user) {
            return redirect()->back()->with(['warning' => __('authentication.not match')]);
        }

        $passwordReset = new PasswordReset();
        $passwordReset->email = $request->email;
        $passwordReset->token = Str::random(40);
        $passwordReset->created_at = Carbon::now();
        $passwordReset->save();

        $details = [
            'full_name' => $user->full_name,
            'email' => $user->email,
            'IP' => $request->ip(),
            'link' => 'password-reset/'.urlencode($passwordReset->email).'/'.$passwordReset->token
        ];

        Mail::to($user->email)->send(new ResetPassword($details));

        return redirect()->back()->with(['success' => __('authentication.mailer password')]);
    }

    public function passwordReset($email, $token)
    {
        $passwordReset = PasswordReset::where('email', $email)
                        ->where('token', $token)
                        ->first();

        if (!$passwordReset) {
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
            ['link' => '/', 'name' => __('authentication.home')],
            ['link' => '/sign-in', 'name' => __('authentication.sign in')],
            ['name' => __('authentication.reset password')]
        ];

        return view('guest.authentications.passwordReset', compact('email', 'token', 'categoryLinks', 'informationLinks', 'contactUsLink', 'breadcrumbs'));
    }

    public function setPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/|confirmed',
            'password_confirmation' => 'required'
        ]);

        $passwordReset = PasswordReset::where('email', $request->email)
                        ->where('token', $request->token)
                        ->first();

        if (!$passwordReset) {
            abort(404);
        }

        $user = User::where('email', $request->email)->first();

        if (Hash::check($request->password, $user->password)) {
            return redirect()->back()->with(['warning' => __('authentication.different')]);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        PasswordReset::where('email', $request->email)->delete();

        return redirect()->route('guest.authentications.index')->with(['success' => __('authentication.reset successfully')]);
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
