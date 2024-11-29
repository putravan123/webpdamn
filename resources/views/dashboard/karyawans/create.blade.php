@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Tambah Karyawan</h1>
    <form action="{{ route('karyawans.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control">
        </div>
        <div class="mb-3">
            <label for="jabatan_id" class="form-label">Jabatan</label>
            <select name="jabatan_id" id="jabatan_id" class="form-select" required>
                @foreach($jabatans as $jabatan)
                    <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('karyawans.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
