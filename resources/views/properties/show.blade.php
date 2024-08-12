@extends('layout.app')

@section('title', $property->title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <img src="{{ asset('images/' . $property->image) }}" class="img-fluid mb-3 animate__animated animate__zoomIn" alt="{{ $property->title }}">
            <h2>{{ $property->title }}</h2>
            <p>{{ $property->description }}</p>
            <h4>Location: {{ $property->location }}</h4>
            <h4>Price: ${{ number_format($property->price, 2) }}</h4>
            <h4>Bedrooms: {{ $property->bedrooms }}</h4>
            <h4>Bathrooms: {{ $property->bathrooms }}</h4>
            <h4>Size: {{ $property->size }} sq ft</h4>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Current Bid
                </div>
                <div class="card-body">
                    <h5 class="card-title">Highest Bid: ${{ number_format($highestBid->bid_amount, 2) }}</h5>
                    <p class="card-text">Placed by: {{ $highestBid->bidder->name }}</p>
                    <a href="{{ url('/properties/' . $property->id . '/bid') }}" class="btn btn-success animate__animated animate__bounce">Place a Bid</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
