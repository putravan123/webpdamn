@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Keuangan List</h1>
    <a href="{{ route('keuangan.create') }}" class="btn btn-primary mb-3">Create New Keuangan</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($keuangan as $key => $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('images/' . $item->image) }}" class="img-fluid rounded" alt="{{ $item->title }}" style="max-width: 100px; height: auto;">
                        @else
                            <img src="https://via.placeholder.com/100" class="img-fluid rounded" alt="No Image">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('keuangan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('keuangan.destroy', $item->id) }}" method="POST" style="display:inline;">
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
