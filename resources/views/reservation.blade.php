@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Reservation</h1>
@stop

@section('content')

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-body">
        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahBukuModal">
                <i class="fa fa-plus"> Tambah Booking</i>
            </button>
            <hr>
            <table id="table-data" class="table table-bordered text-center">
                <thead>
                    <tr class="text-center">
                        <th>Res. ID</th>
                        <th>User ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Kamar</th>
                        <th>Nama Kamar</th>
                        <th>Jumlah Hari</th>
                        <th>Lama Inap</th>
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
                        <td>
                                <button type="button" id="btn-edit-buku" class="btn btn-success">
                                    Check In
                                </button> 
                                <button type="button" class="btn btn-danger" >
                                    Hapus
                                </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-body">
            <table id="table-data" class="table table-bordered">
                <thead>
                    <div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class= "modal-title" id="exampleModalLabel">Tambah Booking</5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                        <label for="kelas_kamar">User ID</label>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle form-control" type="button" data-toggle="dropdown" aria-expanded="false">
                                                    Pilih User
                                                </button>
                                                <div class="dropdown-menu w-100">
                                                    <a class="dropdown-item" href="#">1</a>
                                                    <a class="dropdown-item" href="#">2</a>
                                                    <a class="dropdown-item" href="#">3</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_user">Nama</label>
                                            <input type="text"class="form-control" name="nama_user" id="nama_user" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="kelas_kamar">Kelas</label>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle form-control" type="button" data-toggle="dropdown" aria-expanded="false">
                                                    Pilih Kelas Kamar
                                                </button>
                                                <div class="dropdown-menu w-100">
                                                    <a class="dropdown-item" href="#">Regular</a>
                                                    <a class="dropdown-item" href="#">VIP</a>
                                                    <a class="dropdown-item" href="#">VVIP</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="durasi">Pilih Tanggal</label>
                                            <input type="date" class="form-control" name="durasi" id="durasi" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="durasi">Lama Hari Inap</label>
                                            <input type="text" class="form-control" name="durasi" id="durasi" required/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </thead>
            </table>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card card-default">
    <div class="card-header">{{__('CHECK OUT')}}</div>
        <div class="card-body">
            <table id="table-data" class="table table-bordered text-center">
                <thead>
                    <tr class="text-center">
                        <th>Reservasi ID</th>
                        <th>User ID</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>No. Kamar</th>
                        <th>Durasi</th>
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
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example"> 
                                <button type="button" class="btn btn-danger" >
                                    Check Out / Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop
