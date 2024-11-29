@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Teknis List</h1>
    <a href="{{ route('tekniss.create') }}" class="btn btn-primary mb-3">Create New Teknis</a>

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
                @foreach($teknis as $key => $teknis)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            @if($teknis->image)
                                <img src="{{ asset('images/' . $teknis->image) }}" class="img-fluid rounded" alt="{{ $teknis->title }}" style="max-width: 100px; height: auto;">
                            @else
                                No image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('tekniss.edit', $teknis->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tekniss.destroy', $teknis->id) }}" method="POST" style="display:inline;">
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
