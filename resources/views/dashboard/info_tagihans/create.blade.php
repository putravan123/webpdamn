@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Create New Info Tagihan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('info_tagihans.store') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="tagihan" class="col-sm-2 col-form-label">Tagihan:</label>
            <div class="col-sm-10">
                <input type="number" id="tagihan" name="tagihan" class="form-control" required>
            </div>
        </div>
        <div class="form-group row mt-3">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
