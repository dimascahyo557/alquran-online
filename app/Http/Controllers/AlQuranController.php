<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class AlQuranController extends Controller
{
    public function suratList()
    {
        $url = config('app.api_url') . '/surat';
        $response = Http::get($url);

        if ($response->status() != Response::HTTP_OK) {
            return redirect()->route('home')->with('message', 'Gagal mengambil data surat');
        }

        $data = $response->object();

        return view('surat', compact('data'));
    }
}
