<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use Mail;
use App\Mail\ResetPassword;

use App\Models\UserVerify;
use App\Models\User;
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
        return view('admin.authentications.index');
    }

    public function signIn(Request $request)
    {
        $credentails = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'Admin'], $request->remember_me)) {
            if (!Auth::user()->email_verified_at) {
                return redirect()->back()->with('warning', 'You have not verified your identity.');
            } elseif (Auth::user()->status == 'Blocked') {
                return redirect()->back()->with('error', 'Your account has been blocked.');
            } elseif (Auth::user()->status == 'Deactivated') {
                return redirect()->back()->with('warning', 'Your account has been deactivated.');
            }

            return redirect()->route('admin.dashboards.index');
        }

        return redirect()->back()->with('error', 'The email or password is incorrect.');
    }

    public function signOut()
    {
        Auth::logout();

        return redirect()->route('admin.authentications.index');
    }

    /* Forgot Password */
    public function forgotPassword()
    {
        return view('admin.authentications.forgotPassword');
    }

    public function sendLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)
                ->where('role', 'Admin')
                ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'The email you entered does not match your account.');
        }

        $passwordReset = new PasswordReset();
        $passwordReset->email = $user->email;
        $passwordReset->token = Str::random(40);
        $passwordReset->created_at = Carbon::now();
        $passwordReset->save();

        $details = [
            'full_name' => $user->full_name,
            'email' => $user->email,
            'IP' => $request->ip(),
            'link' => 'admin/password-reset/'.urlencode($passwordReset->email).'/'.$passwordReset->token
        ];

        Mail::to($user->email)->send(new ResetPassword($details));

        return redirect()->back()->with('success', 'We have mailer password reset link to your email.');
    }

    public function passwordReset($email, $token)
    {
        $passwordReset = PasswordReset::where('email', $email)
                        ->where('token', $token)
                        ->first();

        if (!$passwordReset) {
            abort(404);
        }

        return view('admin.authentications.passwordReset', compact('email', 'token'));
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
            return redirect()->back()->with('warning', 'The password must be different from previously used passwords');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        PasswordReset::where('email', $request->email)->delete();

        return redirect()->route('admin.authentications.index')->with('success', 'Your password has been reset successfully. You can now sign in');
    }

    /* Verify */
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

            return redirect()->route('admin.authentications.index')->with('success', 'Thank you for verifying your identity. You can now sign in.');
        }

        return redirect()->route('admin.authentications.index')->with('success', 'Your email is already verified. You can now sign in.');
    }
}
