    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">UpWise</h4>
                    <a class="btn btn-link" href="{{ route('site.about-us') }}">About Us</a>
                    <a class="btn btn-link" href="{{ route('site.contact-us') }}">Contact Us</a>
                    <a class="btn btn-link" href="{{ route('site.policy') }}">Privacy Policy</a>
                    <a class="btn btn-link" href="{{ route('site.terms') }}">Terms & Condition</a>
                    <a class="btn btn-link" href="{{ route('site.faq') }}">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{ $contact->address }}</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+02 {{ $contact->phone }}</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ $contact->email }}</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="{{ $contact->x_url }}"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href="{{ $contact->facebook_url }}"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="{{ $contact->youtube_url }}"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href="{{ $contact->linkedin_url }}"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                @guest
                    <div class="col-lg-6 col-md-12 mx-auto">
                        <section class="py-4 bg-light text-center rounded shadow">
                            <div class="container">
                                <h3 class="mb-3">Start Your Learning Journey Today!</h3>
                                <p class="mb-3">Join thousands of learners and enhance your skills with our expert-led
                                    courses.</p>
                                <a href="{{ route('auth.register') }}" class="btn btn-primary btn-sm mx-1">Join Now</a>
                                <a href="{{ route('site.courses') }}" class="btn btn-outline-primary btn-sm mx-1">Explore
                                    Courses</a>
                            </div>
                        </section>
                    </div>
                @endguest
                @auth
                    <div class="col-lg-6 col-md-12 mx-auto">
                        <section class="py-4 bg-light text-center rounded shadow">
                 <div class="container">
    <h3 class="mb-3">Welcome Back, {{ auth()->user()->name }}! 👋</h3>
    <p class="mb-3" style="color: black;">Continue your learning journey and explore more courses tailored for you.</p>

    <div class="d-flex flex-wrap justify-content-center">
        <a href="" class="btn btn-primary btn-sm mx-1">My Profile</a>
        <a href="" class="btn btn-outline-primary btn-sm mx-1">My Courses</a>

        <form action="{{ route('auth.logout') }}" method="POST" class="mx-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" type="submit">Logout</button>
        </form>
    </div>
</div>

                        </section>
                    </div>


                @endauth
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="{{ route('site.home') }}">UpWise</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="{{ route('site.home') }}">Home</a>
                            <a href="{{ route('site.contact-us') }}">Contact Us</a>
                            <a href="{{ route('site.faq') }}">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('website/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('website/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('website/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('website/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('website/js/main.js') }}"></script>
    </body>

    </html>
