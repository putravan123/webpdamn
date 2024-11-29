@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Tambah Jabatan</h1>
    <form action="{{ route('jabatans.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
            <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('jabatans.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
