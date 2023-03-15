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
                            <a class="nav-link ml-3 text-white" href="{{ route('pekat.laporan') }}">Laporan {{ Illuminate\Support\Facades\Auth::guard('masyarakat')->user()->nama }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-3 btn btn-outline-purple" href="{{ route('pekat.logout') }}"
                                style="text-decoration: underline">Logout</a>
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

            <div class="card mb-3 text-center">TULIS LAPORAN DISINI</div>
            <div class="d-flex justify-content-center mb-3">
                <!-- Button trigger modal -->
                <a type="button" class="small" style="text-decoration: none; color: black;" data-toggle="modal" data-target="#panduanModal">
                    Perhatikan Cara Menyampaikan Pengaduan Yang Baik dan Benar
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-square" viewBox="0 0 16 16" style="color: purple;">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                        </svg>
                </a>
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="panduanModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Panduan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <img src="{{asset('images/arraduan.png')}}" style="width: 100%;">
                    </div>
                </div>
                </div>
            </div>
  
  
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
                    <button type="submit" class="btn text-white btn-purple mt-3" style="width: 100%;">MASUK</button>
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
    @if (Illuminate\Support\Facades\Session::has('berhasil'))
    <script>
        $('#loginModal').modal('show');

    </script>
    @endif

    {{-- <script>
        // Dapatkan elemen form dan tombol kirim
        const formPengaduan = document.getElementById('form-pengaduan');
        const btnKirim = formPengaduan.querySelector('button[type="submit"]');
    
        // Tambahkan event listener pada tombol kirim
        btnKirim.addEventListener('click', function(event) {
            // Cek apakah pengguna sudah login atau belum
            if (!{{ Auth::guard('masyarakat')->user() ? 'true' : 'false' }}) {
                // Tampilkan modal login jika belum login
                event.preventDefault(); // Mencegah form dikirim
                $('#exampleModal').modal('show'); // Menampilkan modal login
            }
        });
    </script> --}}
@endsection
