<div class="container-fluid fixed-top px-0">
    <div class="container px-0">
        <div class="topbar">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8">
                    <div class="topbar-info d-flex flex-wrap">
                        <a href="#" class="text-light me-4"><i class="fas fa-envelope text-white me-2"></i>Example@gmail.com</a>
                        <a href="#" class="text-light"><i class="fas fa-phone-alt text-white me-2"></i>+01234567890</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="topbar-icon d-flex align-items-center justify-content-end">
                        <a href="#" class="btn-square text-white me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn-square text-white me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn-square text-white me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn-square text-white me-2"><i class="fab fa-pinterest"></i></a>
                        <a href="#" class="btn-square text-white me-0"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-light bg-light navbar-expand-xl">
            <a href="{{ url('/') }}" class="navbar-brand ms-3">
                <h1 class="text-primary display-5">Environs</h1>
            </a>
            <button class="navbar-toggler py-2 px-3 me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-light" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ route('workshops.index') }}" class="nav-item nav-link">Workshops</a>
                    <a href="{{ route('causes.index') }}" class="nav-item nav-link">Causes</a>
                    <a href="{{ route('events.index') }}" class="nav-item nav-link">Events</a>
                    <a href="{{ route('projects.index') }}" class="nav-item nav-link">projects</a>
                    <a href="{{ route('articles.index') }}" class="nav-item nav-link">articles</a>



                </div>
                <div class="d-flex align-items-center flex-nowrap pt-xl-0" style="margin-left: 15px;">
                    @guest
                        {{-- Show login button when not authenticated --}}
                        <a href="{{ route('login') }}" class="btn-hover-bg btn btn-primary text-white py-2 px-4 me-3">Login</a>
                    @endguest

                    @auth
                        {{-- Show user name + dropdown/logout when authenticated --}}
                        <div class="dropdown">
                            <a href="#" class="btn btn-light dropdown-toggle" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                                @if(auth()->user()->role === 'admin')
                                    <li><a class="dropdown-item" href="{{ route('admin.causes.index') }}">Admin Dashboard</a></li>
                                @endif
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>

            </div>
        </nav>
    </div>
</div>
