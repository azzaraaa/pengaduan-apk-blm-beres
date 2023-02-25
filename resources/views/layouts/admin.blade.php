<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    @yield('css')

    <style>
        .btn-purple{
            background: #890F0D;
            border: 1px solid #630606;
            color: #fff;
        }

        .btn-purple:hover {
            background: #890F0D;
            border: 1px solid #630606;
            color: #fff;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>

<body>

    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <span class="d-flex" style="align-content: center;gap:10px;">
                    <span>ARRA</span>
                </span>
                <p class="text-white  mb-0">ADUAN RESMI RAKYAT</p>
            </div>

            <ul class="list-unstyled components">
                <li class="{{ Illuminate\Support\Facades\Request::is('admin\dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}"<i class="bi bi-house-door"></i> DASHBOARD</a>
                </li>
                <li class="{{ Illuminate\Support\Facades\Request::is('admin\pengaduan') ? 'active' : '' }}">
                    <a href="{{ route('pengaduan.index') }}"<i class="bi bi-journals"></i> PENGADUAN</a>
                </li>
                <li class="{{ Illuminate\Support\Facades\Request::is('admin\laporan') ? 'active' : '' }}">
                    <a href="{{ route('laporan.index') }}"<i class="bi bi-folder"></i> LAPORAN</a>
                </li>

                @if (Illuminate\Support\Facades\Auth::guard('admin')->user()->level == 'admin')

                <li class="{{ Illuminate\Support\Facades\Request::is('admin\petugas') ? 'active' : '' }}">
                    <a href="{{ route('petugas.index') }}"<i class="bi bi-person-bounding-box"></i> PETUGAS</a>
                </li>
                <li class="{{ Illuminate\Support\Facades\Request::is('admin\masyarakat') ? 'active' : '' }}">
                    <a href="{{ route('masyarakat.index') }}"<i class="bi bi-people-fill"></i> MASYARAKAT</a>
                </li>
                <li class="{{ Illuminate\Support\Facades\Request::is('admin\laporan') ? 'active' : '' }}">
                    <a href="{{ route('laporan.index') }}"<i class="bi bi-folder"></i> LAPORAN</a>
                </li>

                @endif
                <li class="{{ Illuminate\Support\Facades\Request::is('admin\logout') }}">
                    <a href="{{ route('admin.logout') }}" onclick="return confirm('Logout Now?')"><i class="bi bi-door-open"></i> LOG OUT</a>
                </li>
            </ul>
        </nav>


        <div id="content">
            <nav class="navbar navbar-expand-lg " style="background-color: #dadada">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto"  type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="ml-2">@yield('header')</div>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <a href="" class="btn btn-white btn-sm">{{ Illuminate\Support\Facades\Auth::guard('admin')->user()->nama_petugas }}</a>
                        </ul>
                    </div>
                </div>
            </nav>
        @yield('content')
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });

    </script>

    @yield('js')
    </body>

</html>
