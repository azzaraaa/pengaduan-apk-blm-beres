@extends('layouts.admin')

@section('css')
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Petugas')

@section('content')
    <a href="{{ route('petugas.create') }}" class="btn btn-purple mb-2">Tambah Petugas</a>
    <table id="PetugasTable" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Petugas</th>
                <th>Username</th>
                <th>Telp</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($petugas as $k => $v)
            <tr>
                <td>{{ $k += 1}}</td>
                <td>{{ $v->nama_petugas }}</td>
                <td>{{ $v->username }}</td>
                <td>{{ $v->telp }}</td>
                <td>{{ $v->level }}</td>
                <td>
                    <a href="{{ route('petugas.edit', $v->id_petugas) }}" class="btn btn-primary bi bi-pencil-square"></a>

                    <form action="{{ route('petugas.destroy', $v->id_petugas) }}" class="d-inline-block" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('are you sure to delete?')" class="btn btn-danger bi bi-trash" ></button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
 <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
 <script>
    $(document).ready(function () {
         $('#PetugasTable').DataTable();
    });
 </script>
@endsection
