@extends('layouts.admin')

@section('title', 'Halaman Dashboard')

@section('header', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="card shadow">
                <div class="card-header text-center text-white" style="background-color: #831212;">Petugas</div>
                <div class="card-body">
                    <div class="text-center">
                        {{ $petugas }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header text-center text-white" style="background-color: #831212;">Masyarakat</div>
                <div class="card-body">
                    <div class="text-center">
                       {{ $masyarakat }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header text-center text-white" style="background-color: #831212;">Pengaduan Proses</div>
                <div class="card-body">
                    <div class="text-center">
                        {{ $proses }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header text-center text-white" style="background-color: #831212;">Pengaduan Selesai</div>
                <div class="card-body">
                    <div class="text-center">
                        {{ $selesai }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header text-center text-white" style="background-color: #831212;">Pengaduan Terverivikasi</div>
                <div class="card-body">
                    <div class="text-center">
                        {{$pengaduan}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
