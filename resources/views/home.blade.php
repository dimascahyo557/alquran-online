@extends('layouts.home_layout')

@section('title', 'Beranda')

@section('content')
    <div class="d-grid">
        <img class="m-auto" src="{{ asset('image/alquran.png') }}" alt="gambar alquran" style="width: 50%;">

        {{-- Error Message --}}
        @if (session()->has('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="{{ route('surat.list') }}" class="btn btn-outline-secondary border-2 mb-3">Baca Al-Quran</a>
        <a href="{{ $lastReadUrl }}" class="btn btn-outline-secondary border-2 mb-3">Terakhir Baca</a>
        <a href="{{ route('about-app') }}" class="btn btn-outline-secondary border-2 mb-3">Tentang Aplikasi</a>
    </div>
@endsection

@section('credit')
    Image by <a href="https://www.freepik.com/free-vector/hand-drawn-tasbih-illustration_22432656.htm#query=alquran&position=0&from_view=search&track=sph">Freepik</a>
@endsection