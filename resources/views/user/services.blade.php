@extends('layouts.app')

@section('content')
    <h1>Available Services</h1>
    <ul>
        @foreach($services as $service)
            <li>{{ $service->name }} - {{ $service->description }} - ${{ $service->price }}</li>
        @endforeach
    </ul>
@endsection
