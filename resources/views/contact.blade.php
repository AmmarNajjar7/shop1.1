@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Contact Us</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Contact Form -->
    <form method="POST" action="{{ route('contact.store') }}" class="mx-auto" style="max-width: 600px;">
        @csrf

        <!-- Name Field -->
        <div class="form-group mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
        </div>

        <!-- Email Field -->
        <div class="form-group mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
        </div>

        <!-- Message Field -->
        <div class="form-group mb-3">
            <label for="message" class="form-label">Your Message</label>
            <textarea id="message" name="message" class="form-control" rows="5" placeholder="Type your message here" required></textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100">Send Message</button>
    </form>
</div>
@endsection
