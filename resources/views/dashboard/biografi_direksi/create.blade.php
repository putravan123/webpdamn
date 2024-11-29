@extends('dashboard.app')

@section('content')
<div class="container">
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h1 class="text-center my-4">Tambah Biografi Direksi</h1>
    <form action="{{ route('biografi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        </div>
        <div class="row">
            <!-- Gambar -->
            <div class="col-12 mb-3">
                <label for="image" class="form-label">Gambar</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5 mt-3">Simpan</button>
        </div>
    </form>
</div>
@endsection
