@extends('dashboard.app') <!-- Adjust this according to your layout -->

@section('content')
    <div class="container">
        <h1>Edit Pengguna</h1>

        <!-- Error message display -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form starts -->
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data"> <!-- Add enctype for file uploads -->
            @csrf
            @method('PUT')

            <!-- Name input -->
            <div class="form-group mb-3">
                <label for="name">Nama:</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email input -->
            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password input (optional) -->
            <div class="form-group mb-3">
                <label for="password">Password (kosongkan jika tidak ingin mengubah):</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Role dropdown -->
            <div class="form-group mb-3">
                <label for="role_id">Role:</label>
                <select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror" required>
                    <option value="">Pilih Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                @error('role_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image input and preview -->
            <div class="form-group mb-3">
                <label for="image">Gambar:</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @if($user->image)
                    <div class="mt-2">
                        <img src="{{ asset('images/users/' . $user->image) }}" alt="User Image" width="150">
                        <p>Gambar saat ini</p>
                    </div>
                @endif
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Update Pengguna</button>
        </form>
        <!-- Form ends -->
    </div>
@endsection
