@extends('layout.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="jumbotron text-center bg-light p-5 rounded animate__animated animate__fadeIn">
        <h1>Welcome to Property Listings</h1>
        <p>Find your dream property with us. Start bidding on properties today!</p>
        <a href="{{ url('/properties') }}" class="btn btn-primary">Browse Properties</a>
    </div>
</div>
@endsection
