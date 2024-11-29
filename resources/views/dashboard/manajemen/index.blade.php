@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Manajemen List</h1>
    <a href="{{ route('manajemen.create') }}" class="btn btn-primary mb-3">Create New Manajemen</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($manajemen as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @if($item->image)
                                <img src="{{ asset('images/' . $item->image) }}" class="img-fluid rounded" alt="{{ $item->title }}" style="max-width: 100px; height: auto;">
                            @else
                                No image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('manajemen.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('manajemen.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
