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
        .btn-surat:hover {
            background-color: rgba(0, 0, 0, .1);
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        @foreach ($data->data as $surat)
            <a href="" class="btn btn-surat border mb-2 w-100">
                <div class="row py-2 align-items-center">
                    <div class="col-auto">
                        <div class="rounded-circle d-flex justify-content-center align-items-center surat-number">
                            <b>
                                {{ $surat->nomor }}
                            </b>
                        </div>
                    </div>
                    <div class="col text-start">
                        <h5 class="mb-0">
                            {{ $surat->namaLatin }}
                        </h5>
                        <div class="text-muted">
                            {{ $surat->tempatTurun }} | {{ $surat->jumlahAyat }} Ayat
                        </div>
                    </div>
                    <div class="col-auto">
                        <h4 class="mb-0">
                            {{ $surat->nama }}
                        </h4>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection

@section('credit')
    <a href="https://www.freepik.com/free-vector/empty-blank-labels-circular-stamps-set-six_13732377.htm#query=circle%20border&position=3&from_view=search&track=ais">Image by starline</a> on Freepik
@endsection