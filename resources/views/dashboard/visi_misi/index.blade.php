@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Daftar Visi dan Misi</h1>
    <a href="{{ route('visi_misis.create') }}" class="btn btn-primary mb-3">Create New Visi Misi</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($visiMisis as $key => $visiMisi)
            <div class="col-12 mb-4">
                <div class="card border-0">
                    <div class="card-body">
                        @if ($visiMisi->image)
                        <img src="{{ asset('storage/' . $visiMisi->image) }}" alt="Visi Misi Image" class="card-img-top img-fluid" style="height: 250px; object-fit: cover;">
                    @endif
                        <div class="d-flex">
                            <a href="{{ route('visi_misis.edit', $visiMisi->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                            <form action="{{ route('visi_misis.destroy', $visiMisi->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
