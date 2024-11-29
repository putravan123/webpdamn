@extends('dashboard.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-4 text-center">Tambah Blog Baru</h2>
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Judul -->
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Konten -->
                <div class="mb-3">
                    <label for="content" class="form-label">Konten</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gambar -->
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div id="preview-container" class="mt-3" style="display: none;">
                        <p>Preview gambar:</p>
                        <img id="preview" class="img-thumbnail" width="150" alt="Preview Image">
                    </div>
                </div>

                <!-- Tanggal Publikasi -->
                <div class="mb-3">
                    <label for="publish_date" class="form-label">Tanggal Publikasi</label>
                    <input type="date" class="form-control @error('publish_date') is-invalid @enderror" id="publish_date" name="publish_date" value="{{ old('publish_date') }}" required>
                    @error('publish_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Preview Gambar
    function previewImage(event) {
        const previewContainer = document.getElementById('preview-container');
        const preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(event.target.files[0]);
        previewContainer.style.display = 'block';
    }
</script>
@endsection
