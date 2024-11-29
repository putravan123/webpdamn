@extends('dashboard.app')

@section('content')

<h1 class="text-center">Kapasitas Produk</h1>
        <a class="btn btn-primary" href="{{ route('kapasitas-produk.create') }}">Tambah Hukum Baru</a>

    <!-- Display success message if available -->
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mt-3">
        @foreach ($kapasitasProduk as $item)
            <div class="col-md-12 mb-4" style="padding: 30px;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a class="btn btn-primary mt-auto" href="{{ route('kapasitas-produk.edit', $item->id) }}">Edit</a>

                </div>

                <div class="row">
                    <!-- Left image (image) -->
                    <div class="col-12 col-md-6 mb-3 d-flex justify-content-center">
                        @if ($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid rounded shadow-lg" alt="Image" style="max-width: 100%; height: auto; object-fit: cover;">
                        @else
                            <p>No Image</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination (if needed) --}}
    {{-- {{ $hukums->links() }} --}}
@endsection
