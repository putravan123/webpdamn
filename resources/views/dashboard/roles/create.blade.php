@extends('dashboard.app')

@section('content')
    <div class="container">
        <h1>Tambah Role</h1>

        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Role:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Role</button>
        </form>
    </div>
@endsection
