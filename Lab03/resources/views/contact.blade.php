@extends('layouts.content')

@section('title', 'Contact')

@section('description')
Get in touch with us. We are here to help you with any questions about our products and services.
@endsection

@section('content')
<div class="mb-4">
    <h4>Contact Information</h4>
    <p>Feel free to reach out to us through any of the following channels.</p>
</div>

<div class="row">
    <div class="col-md-6">
        <h5>Owner Details</h5>
        <ul class="list-unstyled">
            <li><strong>Name:</strong> Abdullah Sharqawi</li>
            <li><strong>Phone:</strong> 0560616911</li>
            <li><strong>Email:</strong> Abdullah@Sharqawi.com</li>
        </ul>
    </div>
    <div class="col-md-6">
        <h5>Store Location</h5>
        <ul class="list-unstyled">
            <li><strong>City:</strong> Riyadh</li>
            <li><strong>Country:</strong> Saudi Arabia</li>
            <li><strong>Working Hours:</strong> 9 AM - 10 PM</li>
        </ul>
    </div>
</div>

<div class="mt-4">
    <h5>Send us a Message</h5>
    <form>
        <div class="mb-3">
            <label class="form-label">Your Name</label>
            <input type="text" class="form-control" placeholder="Enter your name">
        </div>
        <div class="mb-3">
            <label class="form-label">Your Email</label>
            <input type="email" class="form-control" placeholder="Enter your email">
        </div>
        <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea class="form-control" rows="4" placeholder="Type your message here"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
</div>
@endsection