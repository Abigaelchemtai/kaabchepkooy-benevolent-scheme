@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="text-white text-center d-flex align-items-center justify-content-center" style="
    height: 80vh;
    background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                url('{{ asset('images/2.avif') }}') center/cover no-repeat;
    ">
    <div class="container">
        <h1 class="display-4 fw-bold mb-4">Welcome to Kaabchepkooy Benevolent Fund</h1>
        <p class="lead mb-4">United in purpose, committed to dignified send-offs and member wellbeing.</p>
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Join the Scheme</a>
    </div>
</section>

<!-- Subscription Plans Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Join a Circle of Support</h2>
        <div class="row g-4">

            <!-- Starter Circle -->
            <div class="col-md-4">
                <div class="card border-primary shadow h-100 text-center">
                    <div class="card-body">
                        <i class="bi bi-person-circle text-primary display-4 mb-3"></i>
                        <h5 class="card-title text-primary fw-bold">Starter Circle</h5>
                        <p class="card-text">
                            Begin your journey with us. Get essential funeral support, member alerts, and access to clan meetings.
                        </p>
                        <h6 class="text-muted">Ksh. 200 / year</h6>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary mt-3">Join Starter</a>
                    </div>
                </div>
            </div>

            <!-- Unity Circle -->
            <div class="col-md-4">
                <div class="card border-success shadow h-100 text-center">
                    <div class="card-body">
                        <i class="bi bi-people-fill text-success display-4 mb-3"></i>
                        <h5 class="card-title text-success fw-bold">Unity Circle</h5>
                        <p class="card-text">
                            For active contributors. Enjoy additional benefits, priority assistance, and exclusive event invitations.
                        </p>
                        <h6 class="text-muted">Ksh. 500 / year</h6>
                        <a href="{{ route('register') }}" class="btn btn-outline-success mt-3">Join Unity</a>
                    </div>
                </div>
            </div>

            <!-- Heritage Circle -->
            <div class="col-md-4">
                <div class="card border-warning shadow h-100 text-center">
                    <div class="card-body">
                        <i class="bi bi-gem text-warning display-4 mb-3"></i>
                        <h5 class="card-title text-warning fw-bold">Heritage Circle</h5>
                        <p class="card-text">
                            Our premium tier for legacy members. Enjoy maximum benefits, family coverage, and leadership eligibility.
                        </p>
                        <h6 class="text-muted">Ksh. 1,000 / year</h6>
                        <a href="{{ route('register') }}" class="btn btn-outline-warning mt-3">Join Heritage</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Leaders, Events, Affiliates Section -->
<div class="row mb-5">

    <!-- Leaders (Zoom on hover) -->
    <div class="col-md-4">
        <h3 class="text-center">Leaders</h3>
        <div class="d-flex flex-wrap justify-content-center gap-2">
            @for ($i = 1; $i <= 4; $i++)
                <img src="{{ asset('images/leaders/' . $i . '.avif') }}" alt="Leader {{ $i }}"
                     class="img-fluid rounded-circle zoom-img" style="width: 120px; height: 120px;">
            @endfor
        </div>
        <p class="text-center mt-3">Meet our leadership team committed to service and integrity.</p>
    </div>

    <!-- Events (Slide in from right) -->
    <div class="col-md-4 slide-in-right">
        <h3 class="text-center">Event Photos</h3>
        <div class="d-flex flex-wrap justify-content-center gap-2">
            @for ($i = 1; $i <= 4; $i++)
                <img src="{{ asset('images/events/' . $i . '.avif') }}" alt="Event {{ $i }}"
                     class="img-fluid rounded event-img" style="width: 120px; height: 120px;">
            @endfor
        </div>
        <p class="text-center mt-3">Memories from past clan events and ceremonies.</p>
    </div>

    <!-- Affiliates (3D card effect) -->
    <div class="col-md-4">
        <h3 class="text-center">Affiliates</h3>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            @for ($i = 1; $i <= 4; $i++)
                <div class="affiliate-card">
                    <img src="{{ asset('images/affiliates/' . $i . '.avif') }}" alt="Affiliate {{ $i }}"
                         class="img-fluid rounded shadow" style="width: 100px; height: 100px;">
                </div>
            @endfor
        </div>
        <p class="text-center mt-3">Partners and supporters who walk this journey with us.</p>
    </div>

</div>

<hr class="my-5">


<!-- FAQ Section -->
<section class="mb-5">
    <h2 class="text-center mb-4">Frequently Asked Questions</h2>

    <div class="accordion" id="faqAccordion">

        <!-- FAQ 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true">
                    Who is eligible to join Kaabchepkooy Benevolent Scheme?
                </button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    <ul>
                        <li>Any person who belongs to Kaabchepkooy clan and is aged 15 years and above, and their children below age 15.</li>
                        <li>Legally adopted children or persons recognized by the members.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- FAQ 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                    What do I need to join Kaabchepkooy Benevolent Scheme?
                </button>
            </h2>
            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    <ul>
                        <li>Fully filled membership form</li>
                        <li>Should be a member of Kaabchepkooy clan</li>
                        <li>Age group of 15 years and above</li>
                        <li>Copy of National Identity Card (both sides)</li>
                        <li>Two recent passport-size photographs</li>
                        <li>Registration fee of Ksh.200 payable annually</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- FAQ 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                    What happens if I default on monthly contribution?
                </button>
            </h2>
            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    A member who defaults on monthly subscription will be reminded. If the default exceeds three months, he/she shall be suspended and exited. Such a person will not benefit and may only be readmitted at a fee as per the constitution.
                </div>
            </div>
        </div>

        <!-- FAQ 4 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                    Can a non-registered clan member be assisted in case of death?
                </button>
            </h2>
            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    No. Only voluntary personal assistance is allowed. The fund shall not be used to assist such members.
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Value Statement Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Our Value Statement</h2>
        <div class="row g-4">

            <!-- Mission -->
            <div class="col-md-4">
                <div class="card h-100 shadow border-0 hover-shadow">
                    <div class="card-body text-center">
                        <i class="bi bi-bullseye text-primary display-4 mb-3"></i>
                        <h5 class="card-title text-primary">Mission</h5>
                        <p class="card-text">
                            To Provide Peace, Costeffective and Dignified Farewell to Departed members.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Vision -->
            <div class="col-md-4">
                <div class="card h-100 shadow border-0 hover-shadow">
                    <div class="card-body text-center">
                        <i class="bi bi-eye-fill text-warning display-4 mb-3"></i>
                        <h5 class="card-title text-warning">Vision</h5>
                        <p class="card-text">
                            To be the Leading Benevolent Scheme 
                        </p>
                    </div>
                </div>
            </div>

            <!-- Core Values -->
            <div class="col-md-4">
                <div class="card h-100 shadow border-0 hover-shadow">
                    <div class="card-body text-center">
                        <i class="bi bi-heart-fill text-success display-4 mb-3"></i>
                        <h5 class="card-title text-success">Core Values</h5>
                        <ul class="list-unstyled">
                            <li>✓ Fear of God</li>
                            <li>✓ Unity of Purpose</li>
                            <li>✓ Value of Human Life</li>
                            <li>✓ Integrity</li>
                            <li>✓ Transparency & Accountability</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<hr class="my-5">



@endsection
