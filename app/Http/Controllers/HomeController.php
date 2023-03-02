<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index()
    {
        $lastSurat = Cookie::get('last_surat');
        $lastAyat = Cookie::get('last_ayat');
        if ($lastSurat && $lastAyat) {
            $lastReadUrl = route('surat.show', $lastSurat) . '#ayat-' . $lastAyat;
        } else {
            $lastReadUrl = '#';
        }

        return view('home', compact('lastReadUrl'));
    }
}
