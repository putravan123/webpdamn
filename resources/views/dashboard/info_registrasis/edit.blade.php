@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Edit Info Registrasi</h1>

    <!-- Display error messages if validation fails -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Display success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('info_registrasis.update', $infoRegistrasi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="no_registrasi">No Registrasi:</label>
            <input type="number" name="no_registrasi" class="form-control" value="{{ old('no_registrasi', $infoRegistrasi->no_registrasi) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('info_registrasis.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
</div>
@endsection
