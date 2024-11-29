@extends('dashboard.app')

@section('content')
    <style>
        .slide-container {
            display: flex;
            position: relative;
            overflow: hidden;
            max-width: 100%;
            background-color: transparent;
            padding: 40px 60px;
        }

        .slide {
            display: flex;
            align-items: center;
            justify-content: space-between
        }

        .slide.active {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 20px;
            margin: 0 20px;
        }

        .slide-text {
            max-width: 50%;
        }

        .slide-image {
            text-align: center;
            max-width: 40%;
            margin-left: ;
        }

        .slide-nav.prev {
            left: 20px;
        }

        .slide-nav.next {
            right: 20px;
        }

        .slide-text h2,
        .slide-text p,
        .slide-text button {
            opacity: 0;
            transform: translateY(20px);
            animation: slideIn 1s ease-out forwards;
        }

        .slide-text h2 {
            font-size: 2em;
            font-weight: bold;
            animation-delay: 0.2s;
        }

        .slide-text p {
            font-size: 1.2em;
            margin-bottom: 20px;
            animation-delay: 0.4s;
        }

        .btn-primary {
            padding: 10px 20px;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            animation-delay: 0.6s;
        }

        .slide-image h2 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .slide-image img {
            max-width: 200px;
            height: auto;
        }

        .slide-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: transparent;
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 2em;
            color: black;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .slide-nav:hover {
            background-color: rgba(0, 0, 0, 0.1);
            color: black;
        }

        .slide-nav.prev {
            left: 10px;
        }

        .slide-nav.next {
            right: 10px;
        }

        @keyframes slideIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideOut {
            to {
                opacity: 0;
                transform: translateY(20px);
            }
        }

        .fade-out {
            animation: slideOut 1s ease-out forwards;
        }

        .fade-in {
            animation: slideIn 1s ease-out forwards;
        }
    </style>

@section('content')
    <div class="slide-container d-flex justify-content-center">
        @foreach ($slides as $slide)
            <div class="slide">
                <div class="slide-text">
                    <h2>{{ $slide->title }} <br> {{ $slide->subtitle }}</h2>
                    <p>{{ $slide->description }}</p>
                </div>
                <div class="slide-image ">
                    <img src="{{ asset('storage/' . $slide->image) }}" alt="Slide Image">
                </div>
            </div>
        @endforeach

        <button class="slide-nav prev">&#8249;</button>
        <button class="slide-nav next">&#8250;</button>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const slides = document.querySelectorAll(".slide");
            let currentSlide = 0;

            const prevButton = document.querySelector(".slide-nav.prev");
            const nextButton = document.querySelector(".slide-nav.next");

            function showSlide(index) {
                slides[currentSlide].classList.add("fade-out");
                slides[currentSlide].classList.remove("fade-in");

                currentSlide = (index + slides.length) % slides.length;

                setTimeout(() => {
                    slides.forEach(slide => slide.style.display = 'none');
                    slides[currentSlide].style.display = 'flex';
                    slides[currentSlide].classList.add("fade-in");
                    slides[currentSlide].classList.remove("fade-out");
                }, 1000);
            }

            prevButton.addEventListener("click", function() {
                showSlide(currentSlide - 1);
            });

            nextButton.addEventListener("click", function() {
                showSlide(currentSlide + 1);
            });

            // Inisialisasi slide pertama
            slides.forEach(slide => slide.style.display = 'none');
            slides[0].style.display = 'flex';
            slides[0].classList.add("fade-in");
        });
    </script>




@endsection