@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">ROOM</h1>
@stop

@section('content')

<div class="row">
    <div class="col-3">
        <div class="card card-default">
            <div class="card-header">{{__('Tambah Kamar')}}</div>
            <div class="card-body">
                <table id="table-data" class="table table-bordered">
                    <thead>
                        <form method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                 <input type="text"class="form-control" name="kelas" id="kelas" required/>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text"class="form-control" name="harga" id="harga" required/>
                            </div>
                            <div class="form-group">
                                <label for="picture">Picture</label>
                                <input type="file"class="form-control h-auto" name="picture" id="picture" required/>
                            </div>
                        </form>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="col-9">
        <div class="card card-default">
            <div class="card-header">{{__('List Kamar')}}</div>
                <div class="card-body">
                    <table id="table-data" class="table table-bordered text-center">
                        <thead>
                            <tr class="text-center">
                                <th>No. Kamar</th>
                                <th>Kelas</th>
                                <th>Status</th>
                                <th>Harga</th>
                                <th>Picture</th>
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
                                <td> 
                                    <div class="btn-group" role="group" aria-label="Basic example"> 
                                        <button type="button" id="btn-edit-buku" class="btn btn-success" >
                                            Edit
                                        </button> 
                                        <button type="button" class="btn btn-danger">
                                            Hapus
                                        </button>
                                    </div>
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
                                            <h5 class= "modal-title" id="exampleModalLabel">Tambah Data Buku</5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="nokamar">No. Kamar</label>
                                                    <input type="text"class="form-control" name="nokamar" id="nokamar" required/>
                                                </div>
                                                <div class="form-group">
                                                <label for="kelas">Kelas</label>
                                                    <input type="text"class="form-control" name="kelas" id="kelas" required/>
                                                </div>
                                                <div class="form-group">
                                                <label for="status">Status</label>
                                                    <input type="year"class="form-control" name="status" id="status" required/>
                                                </div>
                                                <div class="form-group">
                                                <label for="harga">Harga</label>
                                                    <input type="text"class="form-control" name="harga" id="harga" required/>
                                                </div>
                                                <div class="form-group">
                                                <label for="picture">Picture</label>
                                                    <input type="file"class="form-control" name="picture" id="picture" required/>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Kirim</button>
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
    </div>
</div>

@stop
