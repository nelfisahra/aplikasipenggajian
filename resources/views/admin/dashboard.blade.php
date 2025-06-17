@extends('layouts.appadmin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard Admin</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Selamat Datang -->
            <div class="col-md-12">
                <div class="alert alert-primary">
                    <h5>👋 Selamat datang, {{ auth()->user()->namaadmin }}!</h5>
                    <p>masuk sebagai <strong>{{ ucfirst(auth()->user()->role) }}</strong>. Gunakan menu di sidebar untuk mengelola sistem.</p>
                </div>
                </div>

<!-- Statistik Admin -->
<div class="col-lg-4 col-6">
    <div class="small-box bg-info">
        <div class="inner">
            <h3>150</h3>
            <p>Total Peminjaman</p>
        </div>
        <div class="icon">
            <i class="fas fa-book"></i>
        </div>
        <a href="#" class="small-box-footer">
            Lihat Detail <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

<div class="col-lg-4 col-6">
    <div class="small-box bg-success">
        <div class="inner">
            <h3>75</h3>
            <p>Admin/Petugas</p>
        </div>
        <div class="icon">
        <i class="fas fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>20</h3>
                        <p>Peminjam Baru</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
 <!-- Card Informasi -->
 <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Sistem</h3>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Sistem ini digunakan untuk mengelola peminjaman buku.</li>
                            <li>Admin dapat menyetujui atau menolak pendaftaran peminjam.</li>
                            <li>Silakan gunakan menu di sidebar untuk mengakses fitur lainnya.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
        