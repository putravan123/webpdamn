@extends('dashboard.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Edit Biografi Direksi</h1>
    <form action="{{ route('biografi.update', $biografi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row">
            <!-- Gambar -->
            <div class="col-12 mb-3">
                <label for="image" class="form-label">Gambar</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($biografi->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $biografi->image) }}" alt="Image" class="img-thumbnail" width="150">
                    </div>
                @endif
            </div>
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5 mt-3">Perbarui</button>
        </div>
    </form>
</div>
@endsection
