<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Registrasi</title>
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
    @include('home.template.registrasi.navbar')
    <!-- Navbar & Hero End -->

    <div class="container mt-5">
        <h2>Form Registrasi</h2>
        <form action="{{ route('registrasis') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="no_telephone" class="form-label">No Telephone</label>
                <input type="number" class="form-control" id="no_telephone" name="no_telephone">
            </div>
            <div class="mb-3">
                <label for="no_ktp" class="form-label">No KTP</label>
                <input type="number" class="form-control" id="no_ktp" name="no_ktp">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Modal for Registration Details -->
    <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel">Registration Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Registrasi berhasil dibuat.</strong></p>
                    <p>Nomor Registrasi: <span id="registrationNumber"></span></p>
                    <p>Waktu Kedaluwarsa: <span id="expirationTime"></span></p>
                    <p>Sisa Waktu: <span id="countdown"></span></p>
                </div>
            </div>
        </div>
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

    <!-- Registration Modal Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                var registrationModal = new bootstrap.Modal(document.getElementById('registrationModal'));
                var expirationTime = new Date("{{ session('expired_at') }}").getTime();
                
                document.getElementById('registrationNumber').textContent = "{{ session('no_registrasi') }}";
                document.getElementById('expirationTime').textContent = "{{ session('expired_at') }}";

                // Countdown timer
                var countdownElement = document.getElementById('countdown');
                var countdownInterval = setInterval(function() {
                    var now = new Date().getTime();
                    var distance = expirationTime - now;

                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    countdownElement.textContent = minutes + "m " + seconds + "s ";

                    if (distance < 0) {
                        clearInterval(countdownInterval);
                        countdownElement.textContent = "Expired";
                    }
                }, 1000);

                registrationModal.show();
            @endif
        });
    </script>
</body>
</html>
