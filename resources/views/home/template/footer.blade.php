<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5">
        <div class="row g-5 d-felx justify-content-between">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <div class="footer-item text-center d-flex flex-column align-items-center">
                        <h3 class="text-white mb-4">
                            <img src="{{ asset('image/pdam-garut.png') }}" alt="Logo" style="width: 100px">
                        </h3>
                        <p class="mb-3">
                            Kabupaten Garut dibentuk pengelola sistem air bersih dilaksanakan oleh Seksi Air Minum yang berada dibawah Dinas Pekerjaan Umum Kabupaten Daerah Tingkat II Kabupaten Garut.
                        </p>
                    </div>
                    
                    {{-- <div class="position-relative">
                        <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Enter your email">
                        <button type="button"
                            class="btn btn-secondary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
                    </div> --}}
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-white mb-4">Media kami</h4>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.youtube.com/@pdamtirtaintankabupatengar7728"><i class="fab fa-youtube me-2"></i>PDAM Tirta Intan Kabupaten Garut</a>
                    <a href="https://www.instagram.com/tirtaintangarut/"><i class="fab fa-instagram me-2"></i>tirtaintangarut</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-white mb-4">Alamat </h4>
                    <a href="#"><i class="fa fa-map-marker-alt me-2"></i> Jl. Raya Bayongbong Km 3
                        Kp. Gandasari – Cilawu
                        Kabupaten Garut</a>
                    <a href="mailto:info@example.com"><i class="fas fa-envelope me-2"></i>pdamgarut@tirtaintan.co.id</a>
                   
                    <a href="tel:+012 345 67890"><i class="fas fa-phone me-2"></i> (0262) 2248250</a>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Copyright Start -->
<div class="container-fluid copyright py-4">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-6 text-center text-md-start mb-md-0">
                <span class="text-body"><a href="{{route('home')}}" class="border-bottom text-white"><i
                            class="fas fa-copyright text-light me-2"></i>Tirta Intan Garut</a>, All right reserved.</span>
            </div>
            <div class="col-md-6 text-center text-md-end text-body">
                login for admin <a class="border-bottom text-white" href="{{route('login')}}">login</a>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->
