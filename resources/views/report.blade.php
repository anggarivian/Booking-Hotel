@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Report</h1>
@stop

@section('content')

<div class="container-fluid">
    <div class="card card-default">
    <div class="card-header">{{__('Laporan Transaksi')}}</div>
        <div class="card-body">
            <a href="" target="_blank" class="btn btn-secondary">
                <i class="fa fa-print"></i>
                Cetak PDF
            </a>
            <hr>
            <table id="table-data" class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Reservasi ID</th>
                        <th>User ID</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>No. Kamar</th>
                        <th>Durasi</th>
                        <th>Harga</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card card-default">
    <div class="card-header">{{__('Laporan Check In')}}</div>
        <div class="card-body">
            <a href="" target="_blank" class="btn btn-secondary">
                <i class="fa fa-print"></i>
                Cetak PDF
            </a>
            <hr>
            <table id="table-data" class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Reservasi ID</th>
                        <th>User ID</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>No. Kamar</th>
                        <th>Durasi</th>
                        <th>Harga</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card card-default">
    <div class="card-header">{{__('Laporan Check Out')}}</div>
        <div class="card-body">
            <a href="" target="_blank" class="btn btn-secondary">
                <i class="fa fa-print"></i>
                Cetak PDF
            </a>
            <hr>
            <table id="table-data" class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Reservasi ID</th>
                        <th>User ID</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>No. Kamar</th>
                        <th>Durasi</th>
                        <th>Harga</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop
