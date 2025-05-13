@extends('layouts.app')

@section('content')

<!-- Hero Banner -->
<section class="py-5 text-center" style="background-color: gold;">
    <div class="container">
        <h1 class="display-5 fw-bold mb-3" style="color: #003366;">About Kaabchepkooy Benevolent Scheme</h1>
        <p class="lead" style="color: #003366;">Together in life, united in rest — a family beyond borders.</p>
    </div>
</section>


<!-- About Us Main Content -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-5">

            <!-- Left: Text Content -->
            <div class="col-md-7">
                <h3 class="text-primary">Our Purpose</h3>
                <p>
                    Kaabchepkooy Benevolent Scheme is a <strong>clan-based initiative</strong> designed to ensure that members and their immediate families receive a decent and dignified burial. The clan spans across Kenya, Uganda, and Tanzania.
                </p>

                <h4 class="text-warning">Why It Matters</h4>
                <p>
                    Funerals come with emotional and financial burden. Our members unite to ease that burden, ensuring every family feels supported during difficult times.
                </p>

                <div class="alert alert-info mt-4">
                    <h5 class="mb-2"><i class="bi bi-cash-coin text-success"></i> Membership Contribution</h5>
                    <ul class="mb-0">
                        <li><strong>Annual Fee:</strong> Ksh. 200</li>
                        <li><strong>Monthly Fee:</strong> Ksh. 150</li>
                        <li>Children under 15 years are covered under parents</li>
                        <li>Only active members benefit</li>
                    </ul>
                </div>

                <div class="mt-4">
                    <h5 class="text-success">Future Vision</h5>
                    <p>
                        Beyond funerals, the scheme envisions supporting education for vulnerable children and expanding welfare services.
                    </p>
                </div>
            </div>

            <!-- Right: Image -->
            <div class="col-md-5 text-center">
                <img src="{{ asset('images/3.avif') }}" alt="Clan Group" class="img-fluid rounded shadow">
                <p class="text-muted mt-2">Our united community</p>
            </div>
        </div>
    </div>
</section>
