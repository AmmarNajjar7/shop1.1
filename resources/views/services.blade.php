<!-- resources/views/services/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Our Services</h1>

        @if($services->isEmpty())
            <p>No services are currently available. Please check back later.</p>
        @else
            <div class="services-list">
                @foreach($services as $service)
                    <div class="service-item">
                        <h2>{{ $service->name }}</h2>
                        <p>{{ $service->description }}</p>
                        <p>Price: ${{ $service->price }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
