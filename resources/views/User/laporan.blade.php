@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
<link rel="stylesheet" href="{{ asset('css/laporan.css') }}">
@endsection

@section('title', 'ARRA - Aduan Resmi Rakyat')

@section('content')
{{-- Section Header --}}
<section class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('pekat.index') }}">
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
                        {{-- <li class="nav-item">
                            <a class="nav-link ml-3 text-white" href="{{ route('pekat.laporan') }}">Laporan</a>
                        </li> --}}
                        <li class="nav-item">
                            <p class="nav-link ml-3 text-white" style="text-decoration: none">{{ Illuminate\Support\Facades\Auth::guard('masyarakat')->user()->nama }}</p>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link ml-3 text-white" href="{{ route('pekat.logout') }}"
                                style="text-decoration: underline">{{ Illuminate\Support\Facades\Auth::guard('masyarakat')->user()->nama }}</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link ml-3 btn btn-outline-purple" href="{{ route('pekat.logout') }}"
                                style="text-decoration: underline" onclick="return confirm('Are you sure to Logout?')">Logout</a>
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

</section>
{{-- Section Card --}}
<div class="container">
    <div class="row justify-content-between">
        <div class="col-lg-8 col-md-12 col-sm-12 col-12 col">
            <div class="content content-top shadow">
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
                @endif
                @if (Illuminate\Support\Facades\Session::has('pengaduan'))
                <div class="alert alert-{{ Illuminate\Support\Facades\Session::get('type') }}">{{ Illuminate\Support\Facades\Session::get('pengaduan') }}</div>
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
                        <option value="8">Sosial Dan Kesejahteraan</option>
                    </select>
                </div>
                    <div class="form-group">
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-custom mt-2">Kirim</button>
                </form>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 col-12 col">
            <div class="content content-bottom shadow">
                <div>
                    <img src="{{ asset('images/user_default.svg') }}" alt="user profile" class="photo">
                    <div class="self-align">
                        <h5><a style="color: #630606" href="#">{{ Illuminate\Support\Facades\Auth::guard('masyarakat')->user()->nama }}</a></h5>
                        <p class="text-dark">{{ Illuminate\Support\Facades\Auth::guard('masyarakat')->user()->username }}</p>
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <p class="italic mb-0">Terverifikasi</p>
                            <div class="text-center">
                                {{ $hitung[0] }}
                            </div>
                        </div>
                        <div class="col">
                            <p class="italic mb-0">Proses</p>
                            <div class="text-center">
                                {{ $hitung[1] }}
                            </div>
                        </div>
                        <div class="col">
                            <p class="italic mb-0">Selesai</p>
                            <div class="text-center">
                                {{ $hitung[2] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-8">
            <a class="d-inline tab {{ $siapa != 'me' ? 'tab-active' : ''}} mr-4" href="{{ route('pekat.laporan') }}">
                Semua
            </a>
            <a class="d-inline tab {{ $siapa == 'me' ? 'tab-active' : ''}}" href="{{ route('pekat.laporan', 'me') }}">
                Laporan Saya
            </a>
            <hr>
        </div>
        @foreach ($pengaduan as $k => $v)
        <div class="col-lg-8">
            <div class="laporan-top">
                <img src="{{ asset('images/user_default.svg') }}" alt="profile" class="profile">
                <div class="d-flex justify-content-between">
                    <div>
                        <p>{{ $v->user->nama }}</p>
                        @if ($v->status == '0')
                        <p class="text-danger">Pending</p>
                        @elseif($v->status == 'proses')
                        <p class="text-warning">{{ ucwords($v->status) }}</p>
                        @else
                        <p class="text-success">{{ ucwords($v->status) }}</p>
                        @endif
                    </div>
                    <div>
                        <p>{{ $v->tgl_pengaduan->format('d M, h:i') }}</p>
                    </div>
                </div>
            </div>
            <div class="laporan-mid">
                <div class="judul-laporan">
                    {{ $v->judul_laporan }}
                </div>
                <p>{{ $v->isi_laporan }}</p>
            </div>
            <div class="laporan-bottom">
                @if ($v->foto != null)
                <img src="{{Illuminate\Support\Facades\Storage::url($v->foto)}}" alt="{{ 'Gambar '.$v->judul_laporan }}" class="gambar-lampiran">
                @endif
                @if ($v->tanggapan != null)
                <p class="mt-3 mb-1">{{ '*Tanggapan dari '. $v->tanggapan->petugas->nama_petugas }}</p>
                <p class="light">{{ $v->tanggapan->tanggapan }}</p>
                @endif
            </div>
            <hr>
        </div>
        @endforeach
    </div>
</div>
{{-- Footer --}}
<div class="mt-5">
    <hr>
    <div class="text-center">
        <p class="italic text-secondary">© 2021 Araa • All rights reserved</p>
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
