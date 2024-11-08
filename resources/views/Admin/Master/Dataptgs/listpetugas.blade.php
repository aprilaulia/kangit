@extends('layout.layout')
@section('content')
    <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $title }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data User</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalcreate">
                                    <i class="fa fa-plus"></i> Tambah User
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($data_user as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->role }}</td>
                                            <td>
                                                <a href="#modaledit{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="#modaldelete{{ $row->id }}" data-toggle="modal"class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
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
        </div>

        <div class="modal fade" id="modalcreate" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Data User</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <form method="POST" action="/user/store">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama Lengkap ..." required>                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email ..." required>                        </div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="password ..." required>                        </div>
            </div>
            <div class="form-group">
                <label>Role</label>
                <select class="form-control" name="role" required>    
                    <option value="" hidden>-- Pilih Role -- </option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                    <option value="pimpinan">Pimpinan</option>
                </select>          
                </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save changes</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

 @foreach ($data_user as $d)
    <div class="modal fade" id="modaledit{{ $d->$id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data User</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form method="POST" action="/user/update/{{ $d->$id }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" value="{{ $d->nama_lengkap }}" class="form-control" name="name" placeholder="Nama Lengkap ..." required>                        </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email"value="{{ $d->email }} class="form-control" name="email" placeholder="Email ..." required>                        </div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="password ..." required>                        </div>
        </div>
        <div class="form-group">
            <label>Role</label>
            <select class="form-control" name="role" required>    
                <option value="" hidden>-- Pilih Role -- </option>
                <option <?php if($d['role']=="admin") echo "selected"; ?> value="admin">Admin</option>
                <option <?php if($d['role']=="petugas") echo "selected"; ?> value="petugas">Petugas</option>
                <option <?php if($d['role']=="pimpinan") echo "selected"; ?> value="pimpinan">Pimpinan</option>
            </select>          
            </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach ($data_user as $c)
    <div class="modal fade" id="modalhapus{{ $c->$id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data User</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form method="POST" action="/user/destroy/{{ $d->$id }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                <h5>Apakah Anda Ingin Menghapus Data Ini?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
