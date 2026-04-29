@extends('layouts.app')

@section('content')
    <h3>Our Products</h3>
    <p class="mb-4">We offer a wide range of products to help you build amazing web applications. Browse through our catalog below.</p>

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Web Application Suite</h5>
                    <p class="card-text">A comprehensive suite of web applications designed to streamline your business operations. Includes project management, team collaboration, and analytics tools.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mobile App Builder</h5>
                    <p class="card-text">Build beautiful, native mobile applications without writing a single line of code. Our drag-and-drop builder supports both iOS and Android platforms.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cloud Storage Pro</h5>
                    <p class="card-text">Secure, scalable cloud storage for all your files and documents. Features automatic backups, file versioning, and team sharing capabilities.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Analytics Dashboard</h5>
                    <p class="card-text">Real-time analytics and reporting dashboard to help you make data-driven decisions. Customizable widgets, automated reports, and predictive insights.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
