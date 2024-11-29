@extends('dashboard.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Edit Team Member</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('team.update', $teamMember->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $teamMember->name) }}" required>
            </div>
            <div class="col-md-6">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $teamMember->title) }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0">
                <label for="image" class="form-label">Image</label>
                <input type="file" id="image" name="image" class="form-control">
                @if ($teamMember->image)
                    <img src="{{ asset('storage/' . $teamMember->image) }}" alt="Team Member Image" class="mt-2 img-fluid rounded" style="max-width: 150px;">
                @endif
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="submit" class="btn btn-primary">Update Team Member</button>
            <a href="{{ route('team.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
