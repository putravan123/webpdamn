<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <link rel="icon" href="{{asset('image/pdam-garut.png')}}" type="image/x-icon">
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
    
        
        <!-- Spinner Start -->
        {{-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        @include('home.template.navbar')
        <!-- Navbar & Hero End -->

        <!-- About Start -->
        <div class="container-fluid about overflow-hidden py-5">
            <div class="container py-5">
                
                <div class="row g-5">
                    @foreach ($blogs as $index => $blog)
                    @if ($index === 0)
                        
                    <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="about-img rounded h-100">
                            <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid rounded" style="object-fit: cover; width: 800px; height: 500px;" alt="">
                            <div class="about-exp">
                                <span>{{ \Carbon\Carbon::parse($blog->publish_date)->locale('id')->translatedFormat('d F Y') }}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="about-item">
                            {{-- <h4 class="text-primary text-uppercase">Berita Terbaru</h4> --}}
                            <h1 class="display-3 mb-3">Berita Terbaru</h1>
                            {{-- <p class="mb-4"></p> --}}
                            @foreach (collect($blogs)->take(3) as $blog)
                            <div class="bg-light rounded p-4 mb-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="pe-4">
                                               <img src="{{ asset('storage/' . $blog->image) }}" alt="" class="rounded-circle bg-primary d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                            </div>
                                            <div class="">
                                                <p class="h4 d-inline-block mb-3">{{$blog->title}}</p>
                                                <p class="mb-0">{{ \Illuminate\Support\Str::limit($blog->content, 40) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <a href="{{route('berita')}}" class="btn btn-secondary rounded-pill py-3 px-5">BACA LEBIH BAYAK</a>
                        </div>
                    </div>
                </div>
                    
                
            </div>
        </div>
        <!-- About End -->


        <!-- Service Start -->
        <div class="container-fluid service bg-light overflow-hidden py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h1 class="display-3 text-capitalize mb-3">Partner PDAM Tirta Intan Garut</h1>
                </div>
                <div class="row gx-0 gy-4 align-items-center">
                    <div class="col-lg-6 col-xl-4 wow fadeInLeft" data-wow-delay="0.2s">
                        @foreach ($abouts as $index => $about)
                            @if ($index < 3)
                                <div class="service-item rounded p-4 mb-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-between">
                                                <div class="service-content text-end">
                                                    <p  class="h4 d-inline-block mb-3">{{ $about->title }}</p>
                                                    <p class="mb-0">{{ $about->description }}</p>
                                                </div>
                                                <div class="ps-4">
                                                    <p  class="service-btn">
                                                        @if ($about->icon)
                                                            <img src="{{ asset('storage/' . $about->icon) }}" alt="{{ $about->title }} icon" class="img-fluid wow fadeIn" data-wow-delay="0.4s" style="width: 40px; height: 40px;">
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
    
                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="bg-transparent text-center">
                            <img src="{{ asset('image/pdam-garut.png') }}" class="img-fluid w-75" alt="PDAM Garut">
                        </div>
                    </div>
    
                    <div class="col-lg-6 col-xl-4 wow fadeInRight" data-wow-delay="0.2s">
                        @foreach ($abouts as $index => $about)
                            @if ($index >= 3)
                                <div class="service-item rounded p-4 mb-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex">
                                                <div class="pe-4">
                                                    <p class="service-btn">
                                                        @if ($about->icon)
                                                            <img src="{{ asset('storage/' . $about->icon) }}" alt="{{ $about->title }} icon" class="img-fluid wow fadeIn" data-wow-delay="0.4s" style="width: 40px; height: 40px;">
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="service-content">
                                                    <p  class="h4 d-inline-block mb-3">{{ $about->title }}</p>
                                                    <p class="mb-0">{{ $about->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Service End -->


        <!-- Team Start -->
        <div class="container-fluid team pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    {{-- <h4 class="text-uppercase text-primary">Our Team</h4> --}}
                    <h1 class="display-3 text-capitalize mb-3">Galeri kami</h1>
                </div>
                <div class="row justify-content-center g-4">
                    @foreach($teamMembers->take(4) as $index => $member)
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="{{ 0.2 + ($index * 0.2) }}s">
                            <div class="team-item p-4">
                                <div class="team-inner rounded">
                                    <div class="team-img">
                                        <img src="{{ asset('storage/' . $member->image) }}" class="img-fluid rounded-top w-100" alt="Image" style="width: 200px; height: 200px;">
                                        <div class="team-share">
                                            {{-- <a class="btn btn-secondary btn-md-square rounded-pill text-white mx-1" href=""><i class="fas fa-share-alt"></i></a> --}}
                                        </div>
                                        {{-- <div class="team-icon rounded-pill py-2 px-2">
                                            <a class="btn btn-secondary btn-sm-square rounded-pill mx-1" href="{{ $member['facebook'] }}"><i class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-secondary btn-sm-square rounded-pill me-1" href="{{ $member['twitter'] }}"><i class="fab fa-twitter"></i></a>
                                            <a class="btn btn-secondary btn-sm-square rounded-pill me-1" href="{{ $member['linkedin'] }}"><i class="fab fa-linkedin-in"></i></a>
                                            <a class="btn btn-secondary btn-sm-square rounded-pill me-1" href="{{ $member['instagram'] }}"><i class="fab fa-instagram"></i></a>
                                        </div> --}}
                                    </div>
                                    <div class="bg-light rounded-bottom text-center py-4">
                                        <h4 class="mb-3">{{ $member['name'] }}</h4>
                                        <p class="mb-0">{{ $member['title'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
        <!-- Team End -->

        <!-- Footer Start -->
        @include('home.template.footer')
        <!-- Footer End -->


        <!-- Back to Top -->
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
