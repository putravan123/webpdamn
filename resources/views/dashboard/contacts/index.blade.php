@extends('dashboard.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-4">Contacts</h1>
        <div class="actions">
            <button class="btn btn-danger btn-sm" id="bulk-delete-btn" onclick="confirmAndSubmit()">Delete Selected</button>
        </div>
    </div>
    <div class="table-responsive">
        <form id="bulk-delete-form" action="{{ route('contacts.destroy', ['contact' => 0]) }}" method="POST">
            @csrf
            @method('DELETE')
            <table class="table table-hover table-borderless">
                <thead class="text-muted">
                    <tr>
                        <th scope="col"><input type="checkbox" id="select-all"></th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr class="email-row">
                            <td>
                                <input type="checkbox" name="contact_ids[]" value="{{ $contact->id }}" class="contact-checkbox">
                            </td>
                            <td class="align-middle">{{ $contact->name }}</td>
                            <td class="align-middle">{{ $contact->email }}</td>
                            <td class="align-middle">{{ $contact->phone }}</td>
                            <td class="align-middle">{{ $contact->subject }}</td>
                            <td class="align-middle">
                                @php
                                    $charCount = strlen($contact->message);
                                @endphp
                            
                                @if ($charCount > 6)
                                    {{ \Illuminate\Support\Str::limit($contact->message, 50, '...') }} 
                                    <a href="javascript:void(0);" class="text-primary" 
                                       onclick="showContactModal('{{ $contact->name }}', '{{ $contact->email }}', '{{ $contact->phone }}', '{{ $contact->subject }}', '{{ $contact->message }}')">
                                       More
                                    </a>
                                @else
                                    {{ $contact->message }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
</div>

<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">Message:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><span id="modal-contact-message"></span></p>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('select-all').addEventListener('click', function (event) {
        let checkboxes = document.querySelectorAll('.contact-checkbox');
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = event.target.checked;
        });
    });

    function confirmAndSubmit() {
        if (confirm('Are you sure you want to delete the selected contacts?')) {
            document.getElementById('bulk-delete-form').submit();
        }
    }

    function showContactModal(name, email, phone, subject, message) {
        document.getElementById('modal-contact-message').textContent = message;
        
        var modal = new bootstrap.Modal(document.getElementById('contactModal'));
        modal.show();
    }
</script>
@endsection
