@extends('layouts.admin')

@section('title', 'Halaman Dashboard')

@section('header', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="card shadow">
                <div class="card-header text-center text-white" style="background-color: #831212;">Petugas <i class="bi bi-person-fill"></i></div>
                <div class="card-body">
                    <div class="text-center">
                        {{ $petugas }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header text-center text-white" style="background-color: #831212;">Masyarakat <i class="bi bi-people-fill"></i></div>
                <div class="card-body">
                    <div class="text-center">
                       {{ $masyarakat }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header text-center text-white" style="background-color: #831212;">Pengaduan Proses <i class="bi bi-hourglass-split"></i></div>
                <div class="card-body">
                    <div class="text-center">
                        {{ $proses }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header text-center text-white" style="background-color: #831212;">Pengaduan Selesai <i class="bi bi-hourglass-bottom"></i></div>
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
                <div class="card-header text-center text-white" style="background-color: #831212;">Pengaduan Terverifikasi <i class="bi bi-patch-check"></i></div>
                <div class="card-body">
                    <div class="text-center">
                        {{$pengaduan}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
