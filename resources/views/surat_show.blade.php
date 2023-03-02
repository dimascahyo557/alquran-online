@extends('layouts.home_layout')

@section('title', 'Pilih Surat')

@section('style')
    <style>
        .surat-number {
            width: 50px;
            height: 50px;
            background-image: url('{{ asset("image/circle-border.png") }}');
            background-size: cover;
            background-position: center;
        }
        
        #ayat .ayat-item:nth-child(odd) {
            background-color: rgba(0, 0, 0, .1);
        }

        .ayat-item {
            scroll-margin-top: 60px;
        }

        .arabic-text {
            font-family: Calibri, Arial, Helvetica, sans-serif;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        {{-- Surat Title --}}
        <div class="row bg-secondary text-white align-items-center rounded p-3">
            <div class="col-auto">
                {{ $data->tempatTurun }}
            </div>
            <div class="col text-center">
                <h3 class="mb-0">{{ $data->namaLatin }}</h3>
                <small>
                    {{ $data->arti }}
                </small>
            </div>
            <div class="col-auto">
                {{ $data->jumlahAyat }} Ayat
            </div>
        </div>

        {{-- Bismillah --}}
        {{-- Skip if surat is al-fatihah and at-taubah --}}
        @if (!in_array($data->nomor, [1, 9]))
            <div class="row py-3 text-center arabic-text">
                <h2>بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ</h2>
            </div>
        @endif

        {{-- Ayat --}}
        <div id="ayat">
            @foreach ($data->ayat as $ayat)
                <button class="btn w-100 ayat-item rounded-0" onclick="setLastRead({{ $ayat->nomorAyat }})" id="ayat-{{ $ayat->nomorAyat }}">
                    <div class="row py-3">
                        <div class="col-auto">
                            <div class="rounded-circle d-flex justify-content-center align-items-center surat-number">
                                <b>
                                    {{ $ayat->nomorAyat }}
                                </b>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="text-end mb-3 arabic-text">
                                {{ $ayat->teksArab }}
                            </h3>
                            <p class="text-start">
                                {{ $ayat->teksLatin }}
                            </p>
                            <p class="text-muted text-start">
                                {{ $ayat->teksIndonesia }}
                            </p>
                        </div>
                    </div>
                </button>
            @endforeach
        </div>

        {{-- Navigation Button --}}
        <nav class="position-fixed w-100" style="bottom: 20px; left: 0;">
            <div class="d-flex justify-content-center">
                <div class="bg-white p-2 rounded shadow">
                    @if ($data->suratSebelumnya)
                        <a href="{{ route('surat.show', $data->suratSebelumnya->nomor) }}" class="btn btn-secondary"><< {{ $data->suratSebelumnya->namaLatin }}</a>
                    @endif
                    @if ($data->suratSelanjutnya)
                        <a href="{{ route('surat.show', $data->suratSelanjutnya->nomor) }}" class="btn btn-secondary">{{ $data->suratSelanjutnya->namaLatin }} >></a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
@endsection

@section('credit')
    <a href="https://www.freepik.com/free-vector/empty-blank-labels-circular-stamps-set-six_13732377.htm#query=circle%20border&position=3&from_view=search&track=ais">Image by starline</a> on Freepik
@endsection

@section('script')
    <script>
        function setLastRead(ayat) {
            const confirmed = confirm(`Atur ayat ${ayat} sebagai terakhir baca?`)
            if (confirmed) {
                let date = new Date()
                date.setTime(date.getTime() + 365*24*60*60*1000)
                const expires = date.toUTCString()

                document.cookie = `last_surat={{ $data->nomor }}; expires=${expires}; path=/`
                document.cookie = `last_ayat=${ayat}; expires=${expires}; path=/`
            }
        }
    </script>
@endsection