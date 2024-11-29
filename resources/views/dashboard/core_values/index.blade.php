@extends('dashboard.app')

@section('content')
<div class="container">
    <h1 class="text-center">Core Value</h1>
    <a class="btn btn-primary mb-3" href="{{ route('core-value.create') }}">Tambah Core Value Baru</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mt-3">
        @foreach ($coreValue as $item)
            <div class="col-md-12 mb-4 p-3">
                <div class="d-flex justify-content-end align-items-center mb-3">
                    <div>
                        <a class="btn btn-warning btn-sm me-2" href="{{ route('core-value.edit', $item->id) }}">Edit</a>
                        <form action="{{ route('core-value.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <!-- Kolom Gambar -->
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        @if ($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" style="width: 100%; height: auto;" alt="Image {{ $loop->iteration }}">
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
