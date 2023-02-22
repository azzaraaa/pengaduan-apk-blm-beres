@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
@endsection

@section('title', 'ARRA - Aduan Resmi Rakyat')

@section('content')
{{-- Section Header --}}
<section class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container-fluid">
            <img src="assets/kujug.png" alt="" style="width: 110px" "height:100px">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" style="margin-left: -30px; margin-top: 30px;">
                    <h4 class="semi-bold mb-0 text-white">ARRA</h4>
                    <p class="italic mt-0 text-white">Aduan Resmi Rakyat</p>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    @if(Illuminate\Support\Facades\Auth::guard('masyarakat')->check())
                    <ul class="navbar-nav text-center ml-auto">
                        <li class="nav-item">
                            <a class="nav-link ml-3 text-white" href="{{ route('pekat.laporan') }}">Laporan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-3 text-white" href="{{ route('pekat.logout') }}"
                                style="text-decoration: underline">{{ Illuminate\Support\Facades\Auth::guard('masyarakat')->user()->nama }}</a>
                        </li>
                    </ul>
                    @else
                    <ul class="navbar-nav text-center ml-auto">
                        <li class="nav-item">
                            <button class="btn text-white" type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#loginModal">Masuk</button>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pekat.formRegister') }}" class="btn btn-outline-purple">Daftar</a>
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="text-center">
        <h2 class="medium text-white mt-3">Aduan Resmi Rakyat</h2>
        <p class="italic text-white mb-5">Sampaikan laporan Anda langsung kepada yang pemerintah berwenang</p>
    </div>

    <div class="wave wave1"></div>
    <div class="wave wave2"></div>
    <div class="wave wave3"></div>
    <div class="wave wave4"></div>
</section>
{{-- Section Card Pengaduan --}}
<div class="row justify-content-center">
    <div class="col-lg-6 col-10 col">
        <div class="content shadow">

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            @if (Illuminate\Support\Facades\Session::has('pengaduan'))
                <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
            @endif

            <div class="card mb-3">Tulis Laporan Disini</div>
            <form action="{{ route('pekat.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="form-group">
                    <textarea name="judul" placeholder="Masukkan Judul Laporan" class="form-control"
                        rows="1">{{ old('judul') }}</textarea>
                </div>
                <div class="form-group">
                    <textarea name="isi_laporan" placeholder="Masukkan Isi Laporan" class="form-control"
                        rows="4">{{ old('isi_laporan') }}</textarea>
                </div>
                <div class="form-group">
                    <input type="text" name="tgl_kejadian" class="form-control" placeholder="Tanggal Kejadian" onfocusin="(this.type='date')" onfocusout="
                    (this.type='text')">{{ old('tgl_kejadian') }}</textarea>
                </div>
                <div class="form-group">
                    <textarea name="lokasi" placeholder="Lokasi Kejadian" class="form-control"
                        rows="1">{{ old('lokasi') }}</textarea>
                </div>
                <div class="input-group mb-3">
                 <select name="kategori"class="custom-select">
                        <option selected>Pilih Kategori Laporan</option>
                        <option value="1">Agama</option>
                        <option value="2">Ekonomi Dan Keuangan</option>
                        <option value="3">Kesehatan</option>
                        <option value="4">Pembangunan Desa, Daerah Tertinggal, Transmigrasi</option>
                        <option value="5">Kekerasan Di Satuan Pendidikan Sekolah, Kuliah, Lembaga Khusus</option>
                        <option value="6">Kekerasan Rumah Tangga</option>
                        <option value="7">Pencegahan, Pemberantasan Penyalahgunaa Dan Peredaran Gelap Narkotika Dan Prekursor Narkotika</option>
                        <option value="8">Politik Dan Hukum</option>
                        <option value="9">Sosial Dan Kesejahteraan</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="file" name="foto" class="form-control">
                </div>
                <button type="submit" class="btn btn-custom mt-2">Kirim</button>
            </form>
        </div>
    </div>
</div>
{{-- Section Hitung Pengaduan --}}
<div class="pengaduan mt-5">
    <div class="bg-green">
        <div class="text-center">
            <h5 class="medium text-dark mt-3">JUMLAH LAPORAN SEKARANG</h5>
            <h2 class="medium text-dark">{{ $pengaduan->count() }}</h2>
        </div>
    </div>
</div>
{{-- Footer --}}
<div class="mt-5">
    <hr>
    <div class="text-center">
        <p class="italic text-dark">© 2023 Araa • All rights reserved</p>
    </div>
</div>
{{-- Modal --}}
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="mt-3">Masuk terlebih dahulu</h3>
                <p>Silahkan masuk menggunakan akun yang sudah didaftarkan.</p>
                <form action="{{ route('pekat.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn- text-white mt-3" style="width: 100%">MASUK</button>
                </form>
                @if (Illuminate\Support\Facades\Session::has('pesan'))
                <div class="alert alert-danger mt-2">
                    {{ Illuminate\Support\Facades\Session::get('pesan') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    @if (Illuminate\Support\Facades\Session::has('pesan'))
    <script>
        $('#loginModal').modal('show');

    </script>
    @endif
@endsection
