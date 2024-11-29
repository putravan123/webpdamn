@extends('dashboard.app')

@section('content')
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <h1>Kapasitas Produk</h1>

        <form action="{{ route('kapasitas-produk.update', $kapasitasProduk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                @if($kapasitasProduk->image)
                    <img src="{{ asset('storage/' . $kapasitasProduk->image) }}" width="100" alt="Image">
                @endif
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </div>
        </form>
    </div>
@endsection

