@extends('layouts.appadmin')

@section('title', 'Detail Admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Detail Admin</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Kolom Kiri (Foto Profil) -->
                        <div class="col-md-4 text-center">
                            <img src="{{ $admin->foto ? asset('storage/' . $admin->foto) : asset('img/default-profile.png') }}" 
                                 class="img-thumbnail rounded-circle shadow" width="150" alt="Foto Admin">
                        </div>
		
                        <!-- Kolom Kanan (Detail Admin) -->
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Nama</th>
                                    <td>: {{ $admin->namaadmin }}</td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td>: {{ $admin->username }}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>: {{ ucfirst($admin->role) }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>: 
                                        @if($admin->status == 'setujui')
                                            <span class="badge bg-success">Disetujui</span>
                                        @elseif($admin->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @else
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
