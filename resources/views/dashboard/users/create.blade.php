@extends('dashboard.app')

@section('content')
    <div class="container">
        <h1>Tambah Pengguna</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="role_id">Role:</label>
                <select name="role_id" id="role_id" class="form-control" required>
                    <option value="">Pilih Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Gambar:</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>        
            <button type="submit" class="btn btn-primary">Tambah Pengguna</button>
        </form>
    </div>
@endsection
