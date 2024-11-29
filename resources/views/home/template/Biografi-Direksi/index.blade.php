<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Biografi Direksi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wdth,wght@0,75..100,300..800;1,75..100,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="{{ asset('template/lib/animate/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="{{ asset('template/css/style.css') }}" rel="stylesheet">

<link rel="icon" href="{{asset('image/pdam-garut.png')}}" type="image/x-icon">
    <!-- Custom CSS -->
    <style>
        .card img {
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        .card img:hover {
            transform: scale(1.05);
        }

        .modal-body img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>

    <!-- Navbar & Hero Start -->
    @include('home.template.Biografi-Direksi.navbar')
    <!-- Navbar & Hero End -->

    <div class="container my-5">
        <h1 class="text-center">Biografi Direksi</h1>
        <div class="row">
            @foreach($biografi_direksi as $biografi)
            <div class="col-md-4 col-sm-6 col-12 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('storage/'.$biografi->image) }}" alt="Profile Photo" class="img-fluid rounded">
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $biografi_direksi->links() }}
        </div>
    </div>

    <!-- Modal Bootstrap untuk Zoom -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Detail Gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="Zoom Image">
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('home.template.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('template/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('template/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('template/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('template/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Custom JavaScript -->
    <script>
        document.querySelectorAll('.card img').forEach(img => {
            img.addEventListener('click', function () {
                const modalImage = document.getElementById('modalImage');
                modalImage.src = this.src; // Set gambar modal sesuai dengan gambar yang diklik
                const modal = new bootstrap.Modal(document.getElementById('imageModal'));
                modal.show(); // Tampilkan modal
            });
        });
    </script>
</body>

</html>
