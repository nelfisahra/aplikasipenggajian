@extends('layouts.app') {{-- Ganti dengan layout yang kamu gunakan --}}

@section('content')
<div class="container">
    <h2>Tambah Data Pegawai</h2>

    {{-- Tampilkan pesan error jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form tambah pegawai --}}
    <form action="{{ route('pegawai.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="namapegawai">Nama Pegawai:</label>
            <input type="text" name="namapegawai" class="form-control" value="{{ old('nama pegawai') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="pangkat">Pangkat:</label>
            <input type="pangkat" name="pangkat" class="form-control" value="{{ old('pangkat') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="jabatan">Jabatan:</label>
            <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="aksi">Aksi:</label>
            <textarea name="aksi" class="form-control" rows="3" required>{{ old('aksi') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
