    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{ route('site.home') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>UpWise</h2>
        </a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('site.home') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ route('site.about-us') }}" class="nav-item nav-link">About</a>
                <a href="{{ route('site.courses') }}" class="nav-item nav-link">Courses</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Discover</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="{{ route('site.team') }}" class="dropdown-item">Our Team</a>
                        <a href="{{ route('site.testimonial') }}" class="dropdown-item">Testimonial</a>
                    </div>
                </div>
                @guest
                    <a href="{{ route('site.contact-us') }}" class="nav-item nav-link">Contact</a>
                @endguest
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ asset('uploads/users/' . Auth::user()->image) }}" alt="Profile Picture"
                                class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Another</a></li>
                        </ul>
                    </li>
                @endauth
                @guest
                    <a href="{{ route('auth.register') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i
                            class="fa fa-arrow-right ms-3"></i></a>
                @endguest
            </div>
        </div>
    </nav>
    <!-- Navbar End -->