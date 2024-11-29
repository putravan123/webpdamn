@extends('dashboard.app')

@section('content')
<div class="container mt-5">
    <h1>Daftar Jabatan</h1>
    <a href="{{ route('jabatans.create') }}" class="btn btn-primary mb-3">Tambah Jabatan</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jabatans as $jabatan)
                    <tr>
                        <td>{{ $jabatan->id }}</td>
                        <td>{{ $jabatan->nama_jabatan }}</td>
                        <td>
                            <a href="{{ route('jabatans.edit', $jabatan->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('jabatans.destroy', $jabatan->id) }}" method="POST" style="display:inline;">
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
