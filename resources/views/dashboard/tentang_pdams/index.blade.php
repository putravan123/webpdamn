@extends('dashboard.app')

@section('content')
<div class="container">

    <h1 class="text-center">Daftar Hukum</h1>

        <a class="btn btn-primary" href="{{ route('tentang-pdams.create') }}">Tambah Hukum Baru</a>
    
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="row mt-3">
        @foreach ($tentangPdam as $item)
            <div class="col-12 mb-4" style="padding: 30px;">
                <div class="d-flex justify-content-end align-items-center mb-3">
                    <!-- Tombol Edit -->
                    <a class="btn btn-primary mt-auto me-2" href="{{ route('tentang-pdams.edit', $item->id) }}">Edit</a>
                    
                    <!-- Tombol Hapus -->
                    <form action="{{ route('tentang-pdams.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3 d-flex justify-content-center">
                        @if ($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid rounded shadow-lg" style="max-width: 100%; height: auto;" alt="{{ $item->title }}">
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- Pagination (if needed) --}}
    {{-- {{ $tentangPdam->links() }} --}}
</div>
@endsection
