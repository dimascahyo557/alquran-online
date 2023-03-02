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
    {{-- Surat Navigation --}}
    <div class="bg-white p-2 rounded shadow-sm border mb-3">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    @if ($data->suratSebelumnya)
                        <a href="{{ route('surat.show', $data->suratSebelumnya->nomor) }}" class="btn btn-outline-secondary border-2 w-100">
                            <div>
                                {{ $data->suratSebelumnya->namaLatin }}
                            </div>
                            <<
                        </a>
                    @endif
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-outline-secondary border-2" data-bs-toggle="modal" data-bs-target="#audioModal">
                        <i class="fa-solid fa-headphones"></i>
                    </button>
                </div>
                <div class="col">
                    @if ($data->suratSelanjutnya)
                        <a href="{{ route('surat.show', $data->suratSelanjutnya->nomor) }}" class="btn btn-outline-secondary border-2 w-100">
                            <div>
                                {{ $data->suratSelanjutnya->namaLatin }}
                            </div>
                            >>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Surat Title --}}
    <div class="container-fluid mb-2">
        <div class="row bg-secondary text-white align-items-center rounded p-3">
            <div class="col-auto">
                {{ $data->tempatTurun }}
            </div>
            <div class="col text-center">
                <h4 class="mb-0">{{ $data->namaLatin }}</h4>
                <small>
                    {{ $data->arti }}
                </small>
            </div>
            <div class="col-auto">
                {{ $data->jumlahAyat }} Ayat
            </div>
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

    {{-- Audio Modal --}}
    <div class="modal fade" id="audioModal" tabindex="-1" aria-labelledby="audioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="audioModalLabel">Audio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="text-center">
                        <div class="mb-3">
                            <h5>Abdullah Al Juhany</h3>
                            <audio controls>
                                <source src="{{ $data->audioFull->{'01'} }}">
                            </audio>
                        </div>

                        <div class="mb-3">
                            <h5>Abdul Muhsin Al Qasim</h3>
                            <audio controls>
                                <source src="{{ $data->audioFull->{'02'} }}">
                            </audio>
                        </div>

                        <div class="mb-3">
                            <h5>Abdurrahman as Sudais</h3>
                            <audio controls>
                                <source src="{{ $data->audioFull->{'03'} }}">
                            </audio>
                        </div>

                        <div class="mb-3">
                            <h5>Ibrahim Al Dossari</h3>
                            <audio controls>
                                <source src="{{ $data->audioFull->{'04'} }}">
                            </audio>
                        </div>

                        <div class="mb-3">
                            <h5>Misyari Rasyid Al Afasi</h3>
                            <audio controls>
                                <source src="{{ $data->audioFull->{'05'} }}">
                            </audio>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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