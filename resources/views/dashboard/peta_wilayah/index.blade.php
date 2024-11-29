@extends('dashboard.app')

@section('content')
<div class="container">
    @if ($petaWilayahs->isEmpty())
        <a class="btn btn-primary" href="{{ route('peta_wilayahs.create') }}">Tambah Peta Wilayah</a>
    @endif
    
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="row mt-3">
        @foreach ($petaWilayahs as $item)
            <div class="col-12 mb-4" style="padding: 30px;">
                <h1>Peta Wilayah</h1>
                <div class="d-flex justify-content-end align-items-center mb-3">
                    @if ($petaWilayahs->count() >= 1)
                        <a class="btn btn-primary" style="margin-right: 25px" href="{{ route('add_peta') }}">Tambah Peta</a>
                    @endif
                    @if ($petaWilayahs->count() >= 1)
                        <a class="btn btn-primary mt-auto" style="margin-right: 25px" href="{{ route('peta_wilayahs.edit', $item->id) }}">Edit</a>
                    @endif
                    @if ($petaWilayahs->count() >= 1)
                    <form action="{{ route('peta_wilayahs.destroy', $item->id) }}" method="POST" style="display:inline;"> 
                        @csrf @method('DELETE') 
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button> 
                    </form>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <h5 class="card-title mb-3">{{ $item->title }}</h5>
                        <p class="card-content">{!! nl2br(e($item->content)) !!}</p>
                    </div>
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
    {{-- {{ $petaWilayahs->links() }} --}}
</div>
@endsection
