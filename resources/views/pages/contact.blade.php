@extends('layouts.app')

@section('content')
    <h3>Contact Us</h3>
    <p class="mb-4">We would love to hear from you. Fill out the form below and we will get back to you as soon as possible.</p>

    <form>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email">
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" placeholder="Enter subject">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" rows="5" placeholder="Enter your message"></textarea>
        </div>
        <button type="button" class="btn btn-primary">Send Message</button>
    </form>
@endsection
