@extends('site.app')

@section('title', 'FAQ')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12">
                <h2 class="mb-4 text-center">FAQ</h2>
                <p class="lead text-center mb-5">Find answers to common questions or contact our support team.</p>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1"
                                aria-expanded="true" aria-controls="faq1">
                                How do I register for a course?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Go to the Courses page, choose your course, and click "Enroll". You may need to sign up
                                first.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                I forgot my password. What should I do?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Click “Forgot Password” on the login page and follow the steps to reset it.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                How can I contact support?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Email us at <a href="mailto:upwise_egypt@gmail.com">upwise_egypt@gmail.com</a> or use the
                                form below.
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-5">

                <p class="mt-5 text-muted text-center">© 2025 UpWise</p>
            </div>
        </div>
    </div>
@endsection
