<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
// use App\Models\Tanggapan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all()->count();

        $masyarakat = Masyarakat::all()->count();

        $pengaduan = Pengaduan::all()->count();

        $proses = Pengaduan::where('status', 'proses')->get()->count();

        $selesai = Pengaduan::where('status', 'proses')->get()->count();

        return view('Admin.Dashboard.index', ['petugas' => $petugas, 'masyarakat' => $masyarakat, 'pengaduan' =>$pengaduan, 'proses' => $proses, 'selesai' => $selesai ]);
    }
}
