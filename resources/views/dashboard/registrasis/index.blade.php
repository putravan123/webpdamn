@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Registrasi List</h1>
    <a href="{{ route('registrasis.create') }}" class="btn btn-primary mb-3">Add New Registrasi</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>No Telephone</th>
                    <th>No KTP</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registrasis as $registrasi)
                <tr>
                    <td>{{ $registrasi->id }}</td>
                    <td>{{ $registrasi->nama_lengkap }}</td>
                    <td>{{ $registrasi->email }}</td>
                    <td>{{ $registrasi->no_telephone }}</td>
                    <td>{{ $registrasi->no_ktp }}</td>
                    <td>{{ $registrasi->content }}</td>
                    <td>
                        <a href="{{ route('registrasis.show', $registrasi->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('registrasis.edit', $registrasi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('registrasis.destroy', $registrasi->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
