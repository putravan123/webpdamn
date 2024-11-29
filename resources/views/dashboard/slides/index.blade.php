@extends('dashboard.app')

@section('content')
<div class="container mt-5">
    <h1>Daftar Slide</h1>
    <a href="{{ route('slides.create') }}" class="btn btn-primary mb-3">Buat Slide Baru</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($slides as $slide)
                    <tr>
                        <td>{{ $slide->title }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $slide->image) }}" style="width: 100px; height: 100px; object-fit: cover;" alt="{{ $slide->title }}">
                        </td>                        
                        <td>
                            <a href="{{ route('slides.edit', $slide->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('slides.destroy', $slide->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus slide ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
