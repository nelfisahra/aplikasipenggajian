@extends('layouts.appadmin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Admin</h3>
    </div>	
    <div class="card-body">
        <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="namaadmin">Nama</label>
                        <input type="text" name="namaadmin" id="namaadmin" class="form-control" value="{{ $admin->namaadmin }}" required>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{ $admin->username }}" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <input type="file" name="foto" id="foto" class="form-control-file">
                            </div>
                            <div>
                                @if ($admin->foto)
                                <img src="{{ asset('storage/' . $admin->foto) }}" alt="Foto Admin" class="img-thumbnail" width="100">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="pending" {{ $admin->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="setujui" {{ $admin->status == 'setujui' ? 'selected' : '' }}>Disetujui</option>
                            <option value="tolak" {{ $admin->status == 'tolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="admin" {{ $admin->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="petugas" {{ $admin->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group mt-3 text-right">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                <a href="{{ route('admin.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
