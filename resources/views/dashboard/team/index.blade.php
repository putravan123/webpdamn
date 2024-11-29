@extends('dashboard.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Team Members</h1>
    <a href="{{ route('team.create') }}" class="btn btn-primary mb-3">Add Team Member</a>

    <div class="row">
        @foreach($teamMembers as $teamMember)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $teamMember->image) }}" class="card-img-top img-fluid rounded-top" alt="{{ $teamMember->name }}" style="height: 300px; object-fit: cover;" data-bs-toggle="modal" data-bs-target="#imageModal{{ $teamMember->id }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $teamMember->name }}</h5>
                        <p class="card-text">{{ $teamMember->title }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('team.edit', $teamMember->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('team.destroy', $teamMember->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="imageModal{{ $teamMember->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $teamMember->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel{{ $teamMember->id }}">{{ $teamMember->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('storage/' . $teamMember->image) }}" class="img-fluid w-100 rounded" alt="{{ $teamMember->name }}">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
