<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        return view('Admin.Petugas.index');
    }

    public function show($id_pengaduan)
    {
        # code...
    }
}
