@extends('dashboard.app')

@section('content')
<div class="container mt-5">
    <h2>Create New Struktur</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('strukturs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
            </div>
            <div class="col-md-6">
                <label for="image" class="form-label">Image (optional)</label>
                <input type="file" name="image" class="form-control" id="image" accept="image/*">
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
@endsection
