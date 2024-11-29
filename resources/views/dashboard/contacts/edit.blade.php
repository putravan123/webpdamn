@extends('dashboard.app')

@section('content')
<h1>Edit Contact</h1>
<form action="{{ route('contacts.update', $contact->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $contact->name }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $contact->email }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" value="{{ $contact->phone }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" name="subject" value="{{ $contact->subject }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" class="form-control">{{ $contact->message }}</textarea>
    </div>
    <button class="btn btn-primary" type="submit">Update</button>
</form>
@endsection
