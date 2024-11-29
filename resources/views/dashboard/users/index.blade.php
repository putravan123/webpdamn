@extends('dashboard.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Users List</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('users.create') }}" class="btn btn-primary mb-4">Create New User</a>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Profile Photo</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>
                            @if ($user->image)
                                <img src="{{ asset('images/users/' . $user->image) }}" alt="{{ $user->name }}" width="50" class="img-fluid">
                            @else
                                Tidak ada gambar
                            @endif
                        </td>                        
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
