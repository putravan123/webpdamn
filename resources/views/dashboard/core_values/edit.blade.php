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

        <form action="{{ route('core-value.update', $coreValue->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    @if ($coreValue->image)
                        <img src="{{ asset('storage/' . $coreValue->image) }}" class="img-fluid mb-3" alt="{{ $coreValue->title }}">
                    @endif
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>
                    <div class="mt-auto text-right">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
