@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Edit Keuangan</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('keuangan.update', $keuangan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                @if($keuangan->image)
                    <div class="mt-2">
                        <img src="{{ asset('images/' . $keuangan->image) }}" class="img-fluid rounded" style="max-width: 100%;" alt="{{ $keuangan->title }}">
                    </div>
                @endif
            </div>
        </div>ea class="form-control" id="content" name="content" rows="4" required>{{ old('content', $keuangan->content) }}</textarea>
        </div>
        <div class="row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
