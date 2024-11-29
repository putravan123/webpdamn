@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Edit Registrasi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('registrasis.update', $registrasi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 row">
            <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $registrasi->nama_lengkap }}" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value="{{ $registrasi->email }}" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="no_telephone" class="col-sm-2 col-form-label">No Telephone:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="no_telephone" name="no_telephone" value="{{ $registrasi->no_telephone }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="no_ktp" class="col-sm-2 col-form-label">No KTP:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="no_ktp" name="no_ktp" value="{{ $registrasi->no_ktp }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="content" class="col-sm-2 col-form-label">Content:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="content" name="content" value="{{ $registrasi->content }}">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
