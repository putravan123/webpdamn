@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Create New Visi Misi</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('visi_misis.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <div class="text-right mt-3">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
