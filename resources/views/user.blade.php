@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">USER</h1>
@stop

@section('content')

<div class="row">
    <div class="col-3">
        <div class="card card-default">
            <div class="card-header">{{__('Tambah User')}}</div>
            <div class="card-body">
                <table id="table-data" class="table table-bordered">
                    <thead>
                        <form method="post" action="{{ route('admin.user.submit')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                 <input type="text"class="form-control" name="name" id="name" required/>
                            </div>
                            <div class="form-group">
                                <label for="phone">No. Telepon</label>
                                <input type="text"class="form-control" name="phone" id="phone" required/>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text"class="form-control h-auto" name="address" id="address" required/>
                            </div>
                            <div class="form-group">
                                <label for="picture">Picture</label>
                                <input type="file"class="form-control h-auto" name="picture" id="picture" required/>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="col-9">
        <div class="card card-default">
            <div class="card-header">{{__('List User')}}</div>
                <div class="card-body">
                    <table id="table-data" class="table table-bordered text-center">
                        <thead>
                            <tr class="text-center">
                                <th>No. User</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Foto</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach($user as $user)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->address}}</td>
                                <td>
                                    @if($user->picture !== null)
                                        <img src="{{asset('storage/picture_user/'.$user->picture)}}" width="100px">
                                    @else
                                            [Gambar Tidak Tersedia]
                                    @endif
                                </td>
                                <td> 
                                    <div class="btn-group" role="group" aria-label="Basic example"> 
                                        <button type="button" id="btn-edit-buku" class="btn btn-success" data-toggle="modal" data-target="#editBukuModal" data-id="{{ $user->id }}">
                                            Edit
                                        </button> 
                                        <button type="button" class="btn btn-danger" onclick="deleteConfirmation('{{$user->id}}' , '{{$user->name}}' )">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
