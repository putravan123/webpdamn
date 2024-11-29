@extends('dashboard.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Edit Hukum</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('hukum.update', $hukum->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    @if ($hukum->image)
                        <img src="{{ asset('storage/' . $hukum->image) }}" class="img-fluid mb-3" alt="{{ $hukum->title }}">
                    @endif
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>
                <div class="col-md-8 d-flex flex-column">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $hukum->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="content">content</label>
                        <textarea class="form-control" id="content" name="content" rows="4" required>{{ $hukum->content }}</textarea>
                    </div>

                    <div class="mt-auto text-right d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
