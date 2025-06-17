@extends('layouts.app') {{-- Ganti dengan layout yang kamu gunakan --}}

@section('content')
<div class="container">
    <h2>Edit Data Pegawai</h2>

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

    {{-- Form edit pegawai --}}
    <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Spoofing method untuk PUT request --}}

        <div class="form-group mb-3">
            <label for="namapegawai">Nama Pegawai:</label>
            <input type="text" name="namapegawai" class="form-control" value="{{ old('namapegawai', $pegawai->namapegawai) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="pangkat">Pangkat:<label>
            <input type="pangkat" ame="pangkat" lass="form-control" value="{{ old('pangkat',$pegawai->pangkat) }" required>
        </div>

        <div class="form-group mb-3">
            <label for="jabatan">Jabatan:</label>
            <textarea name="jabatan" class="form-control" rows="3" required>{{ old('jabatan', $pegawai->jabatan) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="aksi">Aksi:</label>
            <input type="text" name="aksi" class="form-control" value="{{ old('aksi', $pegawai->aksi) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
