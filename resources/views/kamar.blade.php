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
                        <form method="post" action="{{ route('admin.kamar.submit')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="kelas">Nama Kelas</label>
                                 <input type="text"class="form-control" name="kelas" id="kelas" required/>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                 <input type="text"class="form-control" name="harga" id="harga" required/>
                            </div>
                            <div class="form-group">
                                <label for="fasilitas">Fasilitas</label>
                                <input type="text"class="form-control h-auto" name="fasilitas" id="fasilitas" required/>
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
            <div class="card-header">{{__('List Kamar')}}</div>
                <div class="card-body">
                    <table id="table-data" class="table table-bordered text-center">
                        <thead>
                            <tr class="text-center">
                                <th>No. Kamar</th>
                                <th>Nama Kelas</th>
                                <th>Status</th>
                                <th>Harga</th>
                                <th>Picture</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach($kamar as $kamar)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$kamar->kelas}}</td>
                                <td>{{$kamar->status}}</td>
                                <td>{{$kamar->harga}}</td>
                                <td>{{$kamar->fasilitas}}</td>
                                <td>
                                    @if($kamar->picture !== null)
                                        <img src="{{asset('storage/picture_kamar/'.$kamar->picture)}}" width="100px">
                                    @else
                                            [Gambar Tidak Tersedia]
                                    @endif
                                </td>
                                <td> 
                                    <div class="btn-group" role="group" aria-label="Basic example"> 
                                        <button type="button" id="btn-edit-kamar" class="btn btn-success" data-toggle="modal" data-target="#edit" data-id="{{ $kamar->id }}">
                                            Edit
                                        </button> 
                                        <button type="button" class="btn btn-danger" onclick="deleteConfirmation('{{$kamar->id}}' , '{{$kamar->kelas}}' )">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
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
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Kamar</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times; </span> 
                </button> 
            </div> 
            <div class="modal-body"> 
                <form method="post" action="{{ route('admin.kamar.update') }}" enctype="multipart/form-data"> 
                    @csrf
                    @method ('PATCH')
                    <div class="row"> 
                        <div class="col"> 
                        @csrf
                            <div class="form-group">
                                <label for="kelas">Nama Kelas</label>
                                 <input type="text"class="form-control" name="kelas" id="kelas" required/>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                 <input type="text"class="form-control" name="status" id="status" required/>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text"class="form-control" name="harga" id="harga" required/>
                            </div>
                            <div class="form-group">
                                <label for="fasilitas">Fasilitas</label>
                                <input type="text"class="form-control h-auto" name="fasilitas" id="fasilitas" required/>
                            </div>
                            <div class="form-group" id="image-area"></div> 
                            <div class="form-group"> 
                                <label for="edit-picture">Picture</label> 
                                <input type="file" class="form-control h-auto" name="picture" id="edit-picture"/> 
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
            $(document).on('click','#btn-edit-kamar', function(){ 
                let id = $(this).data('id'); 
                $('#image-area').empty(); 
                
                $.ajax({ 
                    type: "get", 
                    url: "{{url('/admin/ajaxadmin/datakamar')}}/"+id, 
                    dataType: 'json', 
                    success: function(res){ 
                        $('#edit-name').val(res.name); 
                        $('#edit-email').val(res.email);
                        $('#edit-phone').val(res.phone); 
                        $('#edit-alamat').val(res.alamat); 
                        $('#edit-id').val(res.id); 
                        $('#edit-old-picture').val(res.picture); 
                    
                        if (res.picture !== null) { 
                            $('#image-area').append("<img src='"+baseurl+"/storage/picture_kamar/"+res.picture+"' width='200px'/>" );
                        } else { 
                            $('#image-area').append('[Gambar tidak tersedia]'); 
                        }
                    },
                });
            });
        });

        function deleteConfirmation(id,kelas) { 
            swal.fire({ 
                title: "Hapus?", 
                type: 'warning', 
                text: "Apakah ands yakin akan menghapus data buku dengan Kelas " +kelas+"?!", 
                showCancelButton: !0,
                confirmButtonText: "Ya, lakukan!", 
                cancelButtonText: "Tidak, batalkan!", 
                 
            }).then (function (e) { 
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
                    $.ajax({ 
                        type: 'POST', 
                        url: "kamar/delete/" + id, 
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