@extends('dashboard.app')

@section('content')
<div class="container mt-5">
    <h1>Daftar Karyawan</h1>
    <a href="{{ route('karyawans.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($karyawans as $karyawan)
                    <tr>
                        <td>{{ $karyawan->id }}</td>
                        <td>{{ $karyawan->nama_lengkap }}</td>
                        <td>{{ $karyawan->email }}</td>
                        <td>{{ $karyawan->nomor_telepon }}</td>
                        <td>{{ $karyawan->jabatan->nama_jabatan ?? 'Tidak ada jabatan' }}</td>
                        <td>
                            <a href="{{ route('karyawans.edit', $karyawan->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('karyawans.destroy', $karyawan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
