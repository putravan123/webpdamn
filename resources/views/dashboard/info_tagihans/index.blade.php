@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Info Tagihan List</h1>
    <a href="{{ route('info_tagihans.create') }}" class="btn btn-primary mb-3">Add New Info Tagihan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Tagihan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($infoTagihans as $infoTagihan)
                <tr>
                    <td>{{ $infoTagihan->id }}</td>
                    <td>{{ $infoTagihan->tagihan }}</td>
                    <td>
                        <a href="{{ route('info_tagihans.show', $infoTagihan->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('info_tagihans.edit', $infoTagihan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('info_tagihans.destroy', $infoTagihan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
