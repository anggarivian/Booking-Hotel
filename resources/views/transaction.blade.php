@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Transaction</h1>
@stop

@section('content')

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-header">{{__('Tambah Transaksi')}}</div>
        <div class="card-body">
            <table id="table-data" class="table table-bordered">
                <thead>
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-2">
                                <label for="user_id">Res. ID</label>
                                <input type="text"class="form-control" name="user_id" id="user_id" required/>
                            </div>       
                            <div class="col-2">
                                <label for="user_id">User ID</label>
                                <input type="text"class="form-control" name="user_id" id="user_id" required/>
                            </div> 
                            <div class="col-2">
                                <label for="user_id">Nama</label>
                                <input type="text"class="form-control" name="user_id" id="user_id" required/>
                            </div>         
                            <div class="col-2">
                                <label for="user_id">Kelas</label>
                                <input type="text"class="form-control" name="user_id" id="user_id" required/>
                            </div> 
                            <div class="col-2">
                                <label for="user_id">No. Kamar</label>
                                <input type="text"class="form-control" name="user_id" id="user_id" required/>
                            </div> 
                            <div class="col-2">
                                <label for="user_id">Durasi</label>
                                <input type="text"class="form-control" name="user_id" id="user_id" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">TAMBAH</button>
                            </div>
                        </div>
                    </form>
                </thead>
            </table>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-header">{{__('Transaksi')}}</div>
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
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example"> 
                                    <button type="button" id="btn-edit-buku" class="btn btn-success">
                                        Edit
                                    </button> 
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop
