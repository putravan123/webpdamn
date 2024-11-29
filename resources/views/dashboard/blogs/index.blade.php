@extends('dashboard.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4 text-center">Daftar Blog</h2>
            <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">Tambah Blog</a>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            @if ($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top img-thumbnail fixed-image" alt="{{ $blog->title }}" data-bs-toggle="modal" data-bs-target="#imageModal{{ $blog->id }}">
                            @else
                                <img src="https://via.placeholder.com/300x200" class="card-img-top img-thumbnail fixed-image" alt="No Image Available">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $blog->title }}</h5>
                                <p class="card-text">{{ Str::limit($blog->content, 100) }}</p>
                                <p class="text-muted"><small>Dipublikasikan pada: {{ \Carbon\Carbon::parse($blog->publish_date)->format('d-m-Y') }}</small></p>
                                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal untuk Zoom Gambar -->
                    <div class="modal fade" id="imageModal{{ $blog->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $blog->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="imageModalLabel{{ $blog->id }}">{{ $blog->title }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid rounded-top w-100" alt="{{ $blog->title }}">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan CSS Inline untuk Mengatur Ukuran Gambar -->
<style>
    .fixed-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
</style>
@endsection
