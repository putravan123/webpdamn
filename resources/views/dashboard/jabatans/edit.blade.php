@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Edit Jabatan</h1>
    <form action="{{ route('jabatans.update', $jabatan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
            <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" value="{{ $jabatan->nama_jabatan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('jabatans.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
