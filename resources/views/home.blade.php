@extends('layouts.app')

@section('title', 'Environs - Home')

@section('content')

    {{-- Carousel Start --}}
    <div class="container-fluid carousel-header vh-100 px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{ asset('img/carousel-1.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">WE'll Save Our Planet</h4>
                            <h1 class="display-1 text-capitalize text-white mb-4">Protect Environment</h1>
                            <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-primary text-white py-3 px-5" href="#">Join With Us</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/carousel-2.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4">WE'll Save Our Planet</h4>
                            <h1 class="display-1 text-capitalize text-white mb-4">Protect Environment</h1>
                            <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-primary text-white py-3 px-5" href="#">Join With Us</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/carousel-3.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4">WE'll Save Our Planet</h4>
                            <h1 class="display-1 text-capitalize text-white mb-4">Protect Environment</h1>
                            <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
                            <div class="d-flex align-items-center justify-content-center">
                                <a class="btn-hover-bg btn btn-primary text-white py-3 px-5" href="#">Join With Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    {{-- Carousel End --}}




    {{-- Causes Section Start --}}
    <section class="causes-hero py-5 bg-light">
        <div class="container text-center py-5">
            <!-- Title -->
            <h2 class="display-5 fw-bold mb-3">Support Our Causes</h2>
            <p class="lead mb-5">Join hands to make a difference. Explore our causes and help create a better future.</p>

            <!-- Animated button -->
            <a href="{{ route('causes.index') }}"
               class="btn btn-primary btn-lg rounded-pill px-5 py-3 fw-bold shadow-sm position-relative overflow-hidden"
               style="transition: all 0.4s;">
                <span class="position-relative">See Our Causes</span>
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-white opacity-10 rounded-pill"
                      style="transform: translateX(-100%); transition: transform 0.4s;"></span>
            </a>

            <!-- Featured Causes Cards -->
            <div class="row justify-content-center mt-5 g-4">
                @foreach($featuredCauses as $cause)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                            <h4><a href="{{ route('causes.show', $cause) }}">{{ $cause->title }}</a></h4>
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">{{ $cause->title }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($cause->description, 80) }}</p>
                                <a href="{{ route('causes.show', $cause) }}" class="btn btn-outline-primary btn-sm">donate now</a>
                            </div>
                            <div class="progress rounded-0">
                                <div class="progress-bar bg-success" role="progressbar"
                                     style="width: {{ $cause->donations_percent }}%;"
                                     aria-valuenow="{{ $cause->donations_percent }}" aria-valuemin="0" aria-valuemax="100">
                                    {{ $cause->donations_percent }}%
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Causes Section End --}}








@endsection
