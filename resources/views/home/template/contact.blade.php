<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Contact</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wdth,wght@0,75..100,300..800;1,75..100,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('template/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
    <link rel="icon" href="{{asset('image/pdam-garut.png')}}" type="image/x-icon">
</head>

<body>
    @include('home.template.navc')

    <div class="container-fluid contact bg-light py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 h-100 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                        <h4 class="text-uppercase text-primary">Mari Hubungi kami</h4>
                        <h1 class="display-3 text-capitalize mb-3">Tulis pesanmu</h1>
                    </div>
                    <form action="{{ route('contact') }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="name" name="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control border-0" id="email" name="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="phone" class="form-control border-0" id="phone" name="phone" placeholder="Phone">
                                    <label for="phone">Your Phone</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0" id="subject" name="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control border-0" placeholder="Leave a message here" id="message" name="message" style="height: 175px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">kirim pesanmu</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="d-inline-flex rounded bg-white w-100 p-4">
                                <i class="fas fa-map-marker-alt fa-2x text-secondary me-4"></i>
                                <div>
                                    <h4>Address</h4>
                                    <p class="mb-0">Jl. Raya Bayongbong - Garut No.220, Mangkurayat, Kec. Cilawu, Kabupaten Garut, Jawa Barat 44181</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="d-inline-flex rounded bg-white w-100 p-4">
                                <i class="fas fa-envelope fa-2x text-secondary me-4"></i>
                                <div>
                                    <h4>Mail Us</h4>
                                    <p class="mb-0">info@example.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                            <div class="d-inline-flex rounded bg-white w-100 p-4">
                                <i class="fa fa-phone-alt fa-2x text-secondary me-4"></i>
                                <div>
                                    <h4>Telephone</h4>
                                    <p class="mb-0">(+012) 3456 7890 123</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="h-100 overflow-hidden">
                                <iframe class="w-100 rounded" style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3396.2551932284155!2d107.8891682742647!3d-7.240492671113825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68b02596639be5%3A0x35ebb1ab630db18!2sPDAM%20Tirta%20Intan%20Garut!5e1!3m2!1sid!2sid!4v1729826781586!5m2!1sid!2sid" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('home.template.footer')

    <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

<!-- Modal Struktur Baru -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center py-4">
                <p id="modal-contact-message" class="mb-0" style="font-size: 1.2rem; font-weight: 500;"></p>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk Menampilkan Modal dan Isi Pesan -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            var contactModal = new bootstrap.Modal(document.getElementById('contactModal'));
            document.getElementById('modal-contact-message').textContent = "{{ session('success') }}";
            contactModal.show();
        @endif

        @if(session('error'))
            var contactModal = new bootstrap.Modal(document.getElementById('contactModal'));
            let errorMessage = "{{ session('error') }}";
            let timeRemaining = Math.ceil({{ session('time_remaining', 0) }} / 60); // Konversi detik ke menit terdekat

            if (timeRemaining > 0) {
                let countdownInterval = setInterval(function () {
                    document.getElementById('modal-contact-message').textContent = `${errorMessage} Silakan coba lagi dalam ${timeRemaining} menit.`;
                    
                    timeRemaining--; // Kurangi 1 setiap menit
                    if (timeRemaining <= 0) {
                        clearInterval(countdownInterval);
                        document.getElementById('modal-contact-message').textContent = errorMessage;
                    }
                }, 60000); // Perbarui setiap 60 detik (1 menit)
                
                // Tampilkan pesan awal segera
                document.getElementById('modal-contact-message').textContent = `${errorMessage} ${timeRemaining} menit.`;
            } else {
                document.getElementById('modal-contact-message').textContent = errorMessage;
            }
            
            contactModal.show();
        @endif

        @if($errors->any())
            var contactModal = new bootstrap.Modal(document.getElementById('contactModal'));
            let errorList = "<ul>";
            @foreach ($errors->all() as $error)
                errorList += "<li>{{ $error }}</li>";
            @endforeach
            errorList += "</ul>";
            document.getElementById('modal-contact-message').innerHTML = errorList;
            contactModal.show();
        @endif
    });
</script>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('template/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('template/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('template/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('template/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/js/main.js') }}"></script>
</body>
</html>
