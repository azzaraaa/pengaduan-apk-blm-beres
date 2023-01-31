@extends('layout.admin')

@section('css')
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Pengaduan')

@section('content')

@endsection

@section('js')
 <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
 <script>
    $(document).ready(function () {
     $('#example').DataTable();
    });
 </script>
@endsection
