@extends('dashboard.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Hukum List</h1>
        @if ($hukums->isEmpty())
            <a class="btn btn-primary" href="{{ route('hukum.create') }}">Add New Hukum</a>
        @endif
        @if ($hukums->count() === 1) 
            <a class="btn btn-primary mt-auto" href="{{ route('hukum.edit', $hukums->first()->id) }}">Edit</a> 
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="row mt-3">
        @foreach ($hukums as $hukum)
            <div class="col-md-12 mb-4">
                <div class="row">
                    <!-- Kolom Gambar (Untuk Desktop dan Mobile) -->
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        @if ($hukum->image)
                            <img src="{{ asset('storage/' . $hukum->image) }}" class="card-img-top" style="width: 100%; height: auto;" alt="{{ $hukum->title }}">
                        @endif
                    </div>

                    <!-- Kolom Teks (Untuk Desktop dan Mobile) -->
                    <div class="col-12 col-md-6">
                        <div class="card-body">
                            <h5 class="card-title">{{ $hukum->title }}</h5>
                            <p class="card-content">{!! nl2br(e($hukum->content)) !!} </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $hukums->links() }}
@endsection
