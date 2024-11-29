@extends('dashboard.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Edit Tentang PDAM</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('peta_wilayahs.update', $petaWilayah->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                @if ($petaWilayah->image)
                    <img src="{{ asset('storage/' . $petaWilayah->image) }}" class="img-fluid rounded mb-3" alt="{{ $petaWilayah->title }}">
                @endif
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $petaWilayah->title }}" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="6" required>{{ $petaWilayah->content }}</textarea>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>
@endsection
