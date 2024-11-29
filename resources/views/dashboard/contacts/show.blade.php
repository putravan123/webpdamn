@extends('dashboard.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Message Details</h1>

    <div class="card">
        <div class="card-body">
            <p class="card-text">{{ $contact->message }}</p>

            <a href="{{ route('contacts.index') }}" class="btn btn-primary mt-3">Back to Contacts</a>
        </div>
    </div>
</div>
@endsection
