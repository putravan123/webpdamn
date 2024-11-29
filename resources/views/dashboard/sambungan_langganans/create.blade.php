@extends('dashboard.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Create Sambungan Langganan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sambungan_langganans.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0">
                <label for="image" class="form-label">Image 1:</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="imagetabel" class="form-label">Image Table:</label>
                <input type="file" class="form-control @error('imagetabel') is-invalid @enderror" id="imagetabel" name="imagetabel" accept="image/*">
                @error('imagetabel')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('sambungan_langganans.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </form>
</div>
@endsection
