@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Create New Info Registrasi</h1>

    <!-- Display errors if validation fails -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Display success message if available -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('info_registrasis.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="no_registrasi">No Registrasi:</label>
            <input type="text" name="no_registrasi" id="no_registrasi" class="form-control" required value="{{ old('no_registrasi') }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('info_registrasis.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
</div>
@endsection
