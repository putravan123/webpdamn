@extends('dashboard.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Info Registrasi List</h1>
    <a href="{{ route('info_registrasis.create') }}" class="btn btn-primary mb-3">Add New Info Registrasi</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>No Registrasi</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($infoRegistrasis as $infoRegistrasi)
            <tr>
                <td>{{ $infoRegistrasi->id }}</td>
                <td>{{ $infoRegistrasi->no_registrasi }}</td>
                <td>
                    <a href="{{ route('info_registrasis.show', $infoRegistrasi->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('info_registrasis.edit', $infoRegistrasi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    
                    <!-- Delete Button with Confirmation -->
                    <form action="{{ route('info_registrasis.destroy', $infoRegistrasi->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $infoRegistrasis->links() }}
</div>

<script>
    // Confirm deletion
    function confirmDelete(event) {
        return confirm('Are you sure you want to delete this record?');
    }
</script>
@endsection
