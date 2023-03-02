@extends('layouts.home_layout')

@section('title', 'Beranda')

@section('content')
    <div class="text-center">
        <img class="m-auto" src="{{ asset('image/alquran.png') }}" alt="gambar alquran" style="width: 40%;">
        <div class="mb-3">
            <h6 class="mb-0">Nama Aplikasi</h6>
            <p>Al-Quranku</p>
        </div>
        <div class="mb-3">
            <h6 class="mb-0">Tentang Aplikasi</h6>
            <p>Aplikasi ini merupakan aplikasi Al-Quran online yang disediakan gratis untuk para pembaca alquran.</p>
        </div>
        <div class="mb-3">
            <h6 class="mb-0">Versi</h6>
            <p>1.0.0</p>
        </div>
        <div class="mb-3">
            <h6 class="mb-0">Pencipta</h6>
            <p>Dimas Cahyo Nugroho</p>
        </div>
    </div>
@endsection

@section('credit')
    Image by <a href="https://www.freepik.com/free-vector/hand-drawn-tasbih-illustration_22432656.htm#query=alquran&position=0&from_view=search&track=sph">Freepik</a>
@endsection