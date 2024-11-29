@extends('dashboard.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Struktur</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('strukturs.update', $struktur->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $struktur->title }}" required>
            </div>
            <div class="col-md-6">
                <label for="image" class="form-label">Image (optional)</label>
                <input type="file" name="image" class="form-control" id="image" accept="image/*">
                @if($struktur->image)
                    <p class="mt-2">Current Image:</p>
                    <img src="{{ asset('storage/' . $struktur->image) }}" alt="{{ $struktur->title }}" class="img-fluid rounded" style="max-width: 100px;">
                @endif
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
