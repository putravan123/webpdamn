<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Teknis</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wdth,wght@0,75..100,300..800;1,75..100,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('template/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Navbar Start -->
    @include('home.template.teknis.navbar')
    <!-- Navbar End -->

    <!-- Layanan Warga Section Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                <h1 class="display-4 text-capitalize mb-3">Teknis</h1>
                <p>Informasi mengenai layanan yang tersedia untuk warga, termasuk pengaduan dan perizinan.</p>
            </div>

            <div class="row g-4 justify-content-center">
                @foreach($teknis as $item)
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card border-0 shadow-lg">
                            <div class="card-body text-center">
                                @if ($item->image)
                                    <img src="{{ asset('images/' . $item->image) }}" 
                                         class="img-fluid rounded shadow-lg mb-3" 
                                         alt="{{ $item->title }}" 
                                         style="width: 100%; max-height: 400px; object-fit: cover; cursor: pointer;" 
                                         data-bs-toggle="modal" 
                                         data-bs-target="#imageModal{{ $item->id }}">
                                @endif
                            </div>
                        </div>
                    </div>
            
                    <!-- Modal for Image Zoom -->
                    <div class="modal fade" id="imageModal{{ $item->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img src="{{ asset('images/' . $item->image) }}" 
                                         class="img-fluid rounded shadow-lg w-100" 
                                         alt="{{ $item->title }}">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            

            <!-- Pagination Control -->
            <div class="d-flex justify-content-center mt-4">
                {{-- {{ $pelayanans->links('pagination::bootstrap-5') }} --}}
            </div>
        </div>
    </div>
    <!-- Layanan Warga Section End -->

    @include('home.template.footer')

    <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>
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
</body>
</html>
