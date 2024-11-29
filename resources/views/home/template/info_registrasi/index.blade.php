<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Info Registrasi</title>
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
</head>

<body>

    <!-- Navbar & Hero Start -->
    @include('home.template.info_registrasi.navbar')
    <!-- Navbar & Hero End -->

    <div class="container mt-5">
        <h2>Form Registrasi</h2>
        <form action="{{ route('infoRegistasi') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">No Registrasi</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    @include('home.template.footer')

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('template/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('template/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('template/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('template/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('template/js/main.js') }}"></script>

    <script>
        // Function to open the blog modal
        function openModal(title, content, image) {
            document.getElementById('blogModalLabel').innerText = title;
            document.getElementById('blogContent').innerText = content;
            document.getElementById('modalImage').src = image;
        }

        // Function to open the image zoom modal
        function openImageModal(imageSrc) {
            document.getElementById('zoomedImage').src = imageSrc;
            var imageZoomModal = new bootstrap.Modal(document.getElementById('imageZoomModal'));
            imageZoomModal.show();
        }
    </script>

</body>
</html>
