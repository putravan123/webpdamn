@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Edit Info Tagihan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('info_tagihans.update', $infoTagihan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="tagihan" class="col-sm-2 col-form-label">Tagihan:</label>
            <div class="col-sm-10">
                <input type="number" id="tagihan" name="tagihan" class="form-control" value="{{ $infoTagihan->tagihan }}" required>
            </div>
        </div>
        <div class="form-group row mt-3">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
