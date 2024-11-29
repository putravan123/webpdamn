@extends('dashboard.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Create About</h1>

    <form action="{{ route('abouts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Title Field -->
            <div class="col-12 col-md-6 mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter title" required>
            </div>
            <!-- Description Field -->
            <div class="col-12 col-md-6 mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="4" placeholder="Enter description" required></textarea>
            </div>
        </div>
        <div class="row">
            <!-- Icon Field -->
            <div class="col-12 mb-3">
                <label for="icon" class="form-label">Icon (Image)</label>
                <input type="file" class="form-control" name="icon" accept="image/*" required>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5">Create</button>
        </div>
    </form>
</div>
@endsection
