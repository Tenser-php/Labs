@extends('layouts.app')

@section('content')
    <h3>Our Pricing Plans</h3>
    <p class="mb-4">Choose the plan that works best for you and your team. All plans include a 14-day free trial.</p>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card text-center">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Basic</h5>
                </div>
                <div class="card-body">
                    <h2 class="card-title">$9<small class="text-muted">/mo</small></h2>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>5 Projects</li>
                        <li>10 GB Storage</li>
                        <li>Email Support</li>
                        <li>Basic Analytics</li>
                    </ul>
                    <a href="#" class="btn btn-outline-success">Get Started</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-center border-primary">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Professional</h5>
                </div>
                <div class="card-body">
                    <h2 class="card-title">$29<small class="text-muted">/mo</small></h2>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>25 Projects</li>
                        <li>100 GB Storage</li>
                        <li>Priority Support</li>
                        <li>Advanced Analytics</li>
                        <li>API Access</li>
                    </ul>
                    <a href="#" class="btn btn-primary">Get Started</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-center">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Enterprise</h5>
                </div>
                <div class="card-body">
                    <h2 class="card-title">$99<small class="text-muted">/mo</small></h2>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Unlimited Projects</li>
                        <li>1 TB Storage</li>
                        <li>24/7 Dedicated Support</li>
                        <li>Custom Analytics</li>
                        <li>Full API Access</li>
                    </ul>
                    <a href="#" class="btn btn-outline-dark">Get Started</a>
                </div>
            </div>
        </div>
    </div>
@endsection
