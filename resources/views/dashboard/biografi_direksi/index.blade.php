@extends('dashboard.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Daftar Biografi Direksi</h1>
    <a href="{{ route('biografi.create') }}" class="btn btn-primary mb-4">Tambah Biografi</a>
    
    <div class="row">
        @foreach($biografis as $biografi)
        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm">
                <!-- Gambar -->
                @if ($biografi->image)
                <img src="{{ asset('storage/' . $biografi->image) }}" class="card-img-top" alt="{{ $biografi->title }}" style="height: 200px; object-fit: cover;">
                @else
                <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="Default Image" style="height: 200px; object-fit: cover;">
                @endif

                <!-- Konten -->
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('biografi.edit', $biografi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('biografi.destroy', $biografi->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
