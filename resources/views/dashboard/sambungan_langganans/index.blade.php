@extends('dashboard.app')

@section('content')
    <!-- Check if no SambunganLangganans exist -->
    @if ($sambunganLangganans->isEmpty())
        <a class="btn btn-primary" href="{{ route('sambungan_langganans.create') }}">Tambah Hukum Baru</a>
    @endif

    <!-- Display success message if available -->
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mt-3">
        @foreach ($sambunganLangganans as $item)
            <div class="col-md-12 mb-4" style="padding: 30px;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Daftar Hukum</h1>

                    <!-- Only show the 'Tambah Hukum Baru' button if the collection is empty -->
                    @if ($sambunganLangganans->isEmpty())
                        <a class="btn btn-primary" href="{{ route('sambungan_langganans.create') }}">Tambah Hukum Baru</a>
                    @endif

                    <!-- Show 'Edit' button if there's exactly 1 item in the collection -->
                    @if ($sambunganLangganans->count() === 1)
                        <a class="btn btn-primary mt-auto" href="{{ route('sambungan_langganans.edit', $item->id) }}">Edit</a>
                    @endif
                </div>

                <div class="d-flex flex-row justify-content-between align-items-center">
                    <!-- Left image (image) -->
                    <div style="padding-right: 20px; flex: 1; text-align: center;">
                        @if ($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid rounded shadow-lg" alt="Image" style="max-width: 100%; height: auto; object-fit: cover;">
                        @else
                            <p>No Image</p>
                        @endif
                    </div>

                    <!-- Right image (imagetabel) -->
                    <div style="flex: 1; text-align: center;">
                        @if ($item->imagetabel)
                            <img src="{{ asset('storage/' . $item->imagetabel) }}" class="img-fluid rounded shadow-lg" alt="Image Table" style="max-width: 100%; height: auto; object-fit: cover;">
                        @else
                            <p>No Image Table</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination (if needed) --}}
    {{-- {{ $hukums->links() }} --}}
@endsection
