@extends('dashboard.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Create New Peta Wilayah</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('peta_wilayahs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                <div class="mt-3">
                    <img id="image-preview" class="img-fluid" style="max-width: 100%; height: auto; display: none;">
                </div>
            </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function() {
            var dataURL = reader.result;
            var output = document.getElementById('image-preview');
            output.src = dataURL;
            output.style.display = 'block';
        };

        reader.readAsDataURL(input.files[0]);
    }
</script>
@endsection
