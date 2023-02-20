<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pengaduan;

class JumlahController extends Controller
{
    public function index()
    {
       $pengaduan = DB::table('pengaduans')->get();

       return view('User.landing', ['pengaduan' => $pengaduan]);
    }
}
