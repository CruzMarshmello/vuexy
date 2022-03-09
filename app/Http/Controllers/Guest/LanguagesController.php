<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    public function swap($locale)
    {
        $availLocale = ['en' => 'en','th' => 'th'];

        if (array_key_exists($locale, $availLocale)) {
            session()->put('locale', $locale);
        }

        return redirect()->back();
    }
}
