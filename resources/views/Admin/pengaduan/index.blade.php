@extends('layouts.admin')

@section('css')
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Pengaduan')

@section('content')
    <table id="pengaduanTable" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Isi Laporan</th>
                <th>Tanggal kejadian</th>
                <th>Lokasi Kejadian</th>
                <th>Kategori Laporan</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengaduan as $k => $v)
            <tr>
                <td>{{ $k += 1 }}</td>
                <td>{{ $v ->tgl_pengaduan->format('d-M-Y') }}</td>
                <td>{{ $v ->isi_laporan }}</td>
                <td>{{ $v ->tgl_kejadian->format('d-M-Y') }}</td>
                <td>{{ $v ->lokasi }}</td>
                <td>
                    @if($v ->kategori == '1')
                        <p>Agama</p>
                    @elseif($v ->kategori == '2')
                        <p>Ekonomi Dan Keuangan</p>
                    @elseif($v ->kategori == '3')
                        <p>Kesehatan</p>
                    @elseif($v ->kategori == '4')
                        <p>Pembangunan Desa, Daerah Tertinggal, Transmigrasi</p>
                    @elseif($v ->kategori == '5')
                        <p>Kekerasan Di Satuan Pendidikan Sekolah, Kuliah, Lembaga Khusus</p>
                    @elseif($v ->kategori == '6')
                        <p>Kekerasan Rumah Tangga</p>
                    @elseif($v ->kategori == '7')
                        <p>Pencegahan, Pemberantasan Penyalahgunaa Dan Peredaran Gelap Narkotika Dan Prekursor Narkotika</p>
                    @elseif($v ->kategori == '8')
                        <p>Politik Dan Hukum</p>
                    @else
                      <p>Sosial Dan Kesejahteraan</p>
                    @endif
                <td>
                    @if ($v ->status == '0')
                        <a href="#" class="badge badge-danger">Pending</a>
                    @elseif ($v ->status == 'proses')
                        <a href="#" class="bagde badge-warning text-white">Proses</a>
                    @else
                        <a href="#" class="badge badge-success">Selesai</a>
                    @endif
                </td>
                <td><a href="{{ route('pengaduan.show', $v ->id_pengaduan) }}" style="text-decoration: underline">Lihat</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
 <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
 <script>
    $(document).ready(function () {
         $('#pengaduanTable').DataTable();
    });
 </script>
@endsection
