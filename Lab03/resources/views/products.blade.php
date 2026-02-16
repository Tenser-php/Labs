@extends('layouts.content')

@section('title', 'Products')

@section('description')
Explore our collection of Apple products. We have the latest iPhone 17 Pro, iPhone 17 Pro Plus and Apple Watch available for you.
@endsection

@section('content')
<div class="mb-4">
    <h4>Our Products</h4>
    <p>Browse our selection of premium Apple devices below.</p>
</div>

<div class="row">
    <!-- iPhone 17 Pro -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">iPhone 17 Pro</h5>
                <p class="card-text">The latest iPhone with A19 Pro chip, 48MP camera system and titanium design.</p>
                <p class="text-primary fw-bold">SAR 4,999</p>
                <a href="#" class="btn btn-primary btn-sm">View Details</a>
            </div>
        </div>
    </div>

    <!-- iPhone 17 Pro Plus -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">iPhone 17 Pro Plus</h5>
                <p class="card-text">Bigger screen, longer battery life and enhanced camera features.</p>
                <p class="text-primary fw-bold">SAR 5,499</p>
                <a href="#" class="btn btn-primary btn-sm">View Details</a>
            </div>
        </div>
    </div>

    <!-- Apple Watch -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Apple Watch Series 10</h5>
                <p class="card-text">Advanced health features, fitness tracking and seamless iPhone integration.</p>
                <p class="text-primary fw-bold">SAR 1,799</p>
                <a href="#" class="btn btn-primary btn-sm">View Details</a>
            </div>
        </div>
    </div>
</div>

<div class="mt-3">
    <p class="text-muted">All products come with 1 year warranty and free delivery within Saudi Arabia.</p>
</div>
@endsection