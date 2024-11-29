@extends('dashboard.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Edit About</h1>

    <form action="{{ route('abouts.update', $about) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <!-- Title Field -->
            <div class="col-12 col-md-6 mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $about->title }}" placeholder="Enter title" required>
            </div>
            <!-- Description Field -->
            <div class="col-12 col-md-6 mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="4" placeholder="Enter description" required>{{ $about->description }}</textarea>
            </div>
        </div>
        <div class="row">
            <!-- Icon Field -->
            <div class="col-12 mb-3">
                <label for="icon" class="form-label">Icon (Image)</label>
                <input type="file" class="form-control" name="icon" accept="image/*">
                <small class="d-block">Leave empty to keep the current image.</small>
                @if ($about->icon)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $about->icon) }}" alt="{{ $about->title }} icon" class="img-thumbnail" style="width: 60px; height: 60px;">
                    </div>
                @endif
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5">Update</button>
        </div>
    </form>
</div>
@endsection
