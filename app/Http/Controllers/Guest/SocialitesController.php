<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Subscribe;
use App\Models\Order;
use App\Models\UserVerify;

class SocialitesController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialite = Socialite::driver($provider)->user();

        $user = User::where('email', $socialite->email)->first();

        if (!$user) {
            $user = new User();
            $user->full_name = $socialite->name;
            $user->email = $socialite->email;
            $user->email_verified_at = Carbon::now();
            $user->password = Hash::make(Str::random(40));
            $user->role = 'User';
            $user->status = 'Active';
            $user->save();

            $subscribe = Subscribe::where('email', $socialite->email)->first();
            if ($subscribe) {
                $subscribe->user_id = $user->id;
                $subscribe->save();
            } else {
                $subscribe = new Subscribe();
                $subscribe->email = $socialite->email;
                $subscribe->status = 'Enabled';
                $subscribe->user_id = $user->id;
                $subscribe->save();
            }

            $orders = Order::where('email', $socialite->email)->get();
            foreach ($orders as $key => $order) {
                $order->user_id = $user->id;
                $order->save();
            }

            $userVerify = new UserVerify();
            $userVerify->token = Str::random(40);
            $userVerify->user_id = $user->id;
            $userVerify->save();
        } else {
            if ($user->email_verified_at == '') {
                $user->email_verified_at = Carbon::now();
                $user->save();
            }
        }

        Auth::login($user);

        return redirect()->route('/');
    }
}
