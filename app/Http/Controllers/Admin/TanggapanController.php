<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;
use App\Models\Tanggapan;
use Illuminate\Http\Request;


class TanggapanController extends Controller
{
    public function createOrUpdate(Request $request)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();

        $tanggapan = Tanggapan::where('id_pengaduan', $request->id_pengaduan)->first();

        if ($tanggapan) {
            $pengaduan->update(['status' => $request->status]);

            $tanggapan->update([
                'id_pengaduan' => $request->id_pengaduan,
                'isi_tanggapan' => $request->isi_tanggapan,
                'tgl_tanggapan' => date('Y-m-d'),
                'id_petugas' => Auth::guard('admin')->user()->id_petugas
            ]);

            return redirect()->route('pengaduan.show', ['pengaduan' => $pengaduan, 'tanggapan' => $tanggapan])->with(['status' => 'Berhasil Dikirim!']);
        } else {
            $pengaduan->update(['status' => $request->status]);

            $tanggapan = Tanggapan::create([
                'id_pengaduan' => $request->id_pengaduan,
                'tgl_tanggapan' => date('Y-m-d'),
                // dirubah tanggapan
                'isi_tanggapan' => $request->isi_tanggapan,
                'id_petugas' => Auth::guard('admin')->user()->id_petugas
            ]);

            return redirect()->route('pengaduan.show', ['pengaduan' => $pengaduan, 'tanggapan' => $tanggapan])->with(['status' => 'Berhasil Dikirim!']);
        }
    }
}
