@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Edit Sambungan Langganan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sambungan_langganans.update', $sambunganLangganan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0">
                <label for="image" class="form-label">Image 1:</label>
                <div>
                    @if ($sambunganLangganan->image)
                        <img src="{{ asset('storage/' . $sambunganLangganan->image) }}" class="img-fluid rounded mb-3" alt="Current Image 1">
                    @else
                        No Image
                    @endif
                </div>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="imagetabel" class="form-label">Image Table:</label>
                <div>
                    @if ($sambunganLangganan->imagetabel)
                        <img src="{{ asset('storage/' . $sambunganLangganan->imagetabel) }}" class="img-fluid rounded mb-3" alt="Current Image Table">
                    @else
                        No Image
                    @endif
                </div>
                <input type="file" name="imagetabel" id="imagetabel" class="form-control @error('imagetabel') is-invalid @enderror">
                @error('imagetabel')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('sambungan_langganans.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </form>
</div>
@endsection
