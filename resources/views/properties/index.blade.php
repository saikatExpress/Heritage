@extends('layout.app')

@section('title', 'Properties')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="my-4">Available Properties</h2>

        <a class="btn btn-sm btn-primary" href="{{ url('/properties/create') }}">Create Property</a>
    </div>
    
    <!-- Search and Filter -->
    <div class="row mb-4">
        @if(session('success'))
            <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-md-8">
            <input type="text" id="search-input" class="form-control" placeholder="Search properties...">
        </div>
        <div class="col-md-4">
            <select id="filter-input" class="form-control">
                <option value="">All</option>
                <option value="2">2 Bedrooms</option>
                <option value="3">3 Bedrooms</option>
                <option value="4">4 Bedrooms</option>
            </select>
        </div>
    </div>

    <!-- Property Cards -->
    <div class="row" id="property-list">
        @foreach($properties as $property)
            <div class="col-md-4 property-item" data-bedrooms="{{ $property->bedrooms }}">
                <div class="card mb-4">
                    <img style="height: 200px;" src="{{ asset('storage/' . $property->image) }}" class="card-img-top" alt="{{ $property->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $property->title }}</h5>
                        <p class="card-text">{{ $property->description }}</p>
                        <a href="{{ url('/properties/' . $property->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Search functionality
            $('#search-input').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#property-list .property-item').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            // Filter functionality
            $('#filter-input').on('change', function() {
                var filter = $(this).val();
                $('#property-list .property-item').filter(function() {
                    if (filter) {
                        $(this).toggle($(this).data('bedrooms') == filter);
                    } else {
                        $(this).toggle(true);
                    }
                });
            });

            // Auto-hide success message
            setTimeout(function() {
                $('#success-message').fadeOut('slow');
            }, 3000); // Hide after 3 seconds
        });
    </script>
    <script>
        // app.js
        $(document).ready(function() {
            // Search functionality
            $('#search-input').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#property-list .property-item').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            // Filter functionality
            $('#filter-input').on('change', function() {
                var filter = $(this).val();
                $('#property-list .property-item').filter(function() {
                    if (filter) {
                        $(this).toggle($(this).data('bedrooms') == filter);
                    } else {
                        $(this).toggle(true);
                    }
                });
            });
        });
    </script>
@endsection
