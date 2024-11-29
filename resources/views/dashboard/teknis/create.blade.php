@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Create New Teknis</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tekniss.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
@endsection
