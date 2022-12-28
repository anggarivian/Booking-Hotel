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
                                <label for="email">Email</label>
                                 <input type="text"class="form-control" name="email" id="email" required/>
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
                                        <button type="button" id="btn-edit-user" class="btn btn-success" data-toggle="modal" data-target="#edit" data-id="{{ $user->id }}">
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

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times; </span> 
                </button> 
            </div> 
            <div class="modal-body"> 
                <form method="post" action="{{ route('admin.user.update') }}" enctype="multipart/form-data"> 
                    @csrf
                    @method ('PATCH')
                    <div class="row"> 
                        <div class="col-md-6"> 
                        @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                 <input type="text"class="form-control" name="name" id="name" required/>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                 <input type="text"class="form-control" name="email" id="email" required/>
                            </div>
                            <div class="form-group">
                                <label for="phone">No. Telepon</label>
                                <input type="text"class="form-control" name="phone" id="phone" required/>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text"class="form-control h-auto" name="address" id="address" required/>
                            </div>
                        </div> 
                        <div class="col-and-6"> 
                            <div class="form-group" id="image-area"></div> 
                            <div class="form-group"> 
                                <label for="edit-picture">Picture</label> 
                                <input type="file" class="form-control" name="picture" id="edit-picture"/> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
                <div class="modal-footer"> 
                    <input type="hidden" name="id" id="edit-id"/> 
                    <input type="hidden" name="old_cover" id="edit-old-cover"/> 
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> 
                    <button type="submit" class="btn btn-success">Update</button> 
                </form> 
            </div> 
        </div> 
    </div> 
</div>

@stop


@section('js')

<script> 
        $(function(){ 
            $(document).on('click','#btn-edit-user', function(){ 
                let id = $(this).data('id'); 
                $('#image-area').empty(); 
                
                $.ajax({ 
                    type: "get", 
                    url: "{{url('/admin/ajaxadmin/dataUser')}}/"+id, 
                    dataType: 'json', 
                    success: function(res){ 
                        $('#edit-name').val(res.name); 
                        $('#edit-email').val(res.email);
                        $('#edit-phone').val(res.phone); 
                        $('#edit-alamat').val(res.alamat); 
                        $('#edit-id').val(res.id); 
                        $('#edit-old-picture').val(res.picture); 
                    
                        if (res.picture !== null) { 
                            $('#image-area').append("<img src='"+baseurl+"/storage/picture_user/"+res.picture+"' width='200px'/>" );
                        } else { 
                            $('#image-area').append('[Gambar tidak tersedia]'); 
                        }
                    },
                });
            });
        });

        function deleteConfirmation(id,name) { 
            swal.fire({ 
                title: "Hapus?", 
                type: 'warning', 
                text: "Apakah ands yakin akan menghapus data buku dengan Nama" +name+"?!", 
                showCancelButton: !0,
                confirmButtonText: "Ya, lakukan!", 
                cancelButtonText: "Tidak, batalkan!", 
                 
            }).then (function (e) { 
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
                    $.ajax({ 
                        type: 'POST', 
                        url: "user/delete/" + id, 
                        data: {_token: CSRF_TOKEN}, 
                        dataType: 'JSON', 
                        success: function (results) { 
                            if (results.success === true) { 
                                swal.fire("Done!", results.message, "success"); 
                                setTimeout(function(){ 
                                    location.reload(); 
                                },1000);
                            } else { 
                                 swal.fire("Error!", results.message, "error");
                            }
                        }
                    }); 
                } else { 
                    e.dismiss; 
                } 
            }, function (dismiss) {
                 return false; 
            })
        }
        
</script>
@stop