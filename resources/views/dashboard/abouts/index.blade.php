@extends('dashboard.app')

@section('content')
    <div class="container">
        <h1>Patner Kami</h1>
        <a href="{{ route('abouts.create') }}" class="btn btn-primary mb-3">Create New</a>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Icon</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($abouts as $about)
                        <tr>
                            <td>{{ $about->title }}</td>
                            <td>{{ $about->description }}</td>
                            <td>
                                @if ($about->icon)
                                    <img src="{{ asset('storage/' . $about->icon) }}" alt="{{ $about->title }} icon"
                                        style="width: 40px; height: 40px;">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('abouts.edit', $about) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('abouts.destroy', $about) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
