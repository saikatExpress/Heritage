@extends('layout.app')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
                <div class="card mb-4 shadow-sm border-0">
                    <img style="height: 200px; object-fit: cover;" src="{{ asset('storage/' . $property->image) }}" class="card-img-top" alt="{{ $property->title }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary mb-3"><i class="fas fa-home me-2"></i>{{ $property->title }}</h5>
                        <div class="d-flex flex-column gap-2 text-muted" style="font-size: 0.85rem;">
                            <p class="d-flex align-items-center m-0"><i class="fas fa-info-circle me-2"></i>{{ $property->description }}</p>
                            <p class="d-flex align-items-center m-0"><i class="fas fa-user me-2"></i>{{ $property->owner->name }}</p>
                            <p class="d-flex align-items-center m-0"><i class="fas fa-bed me-2"></i>{{ $property->bedrooms }} Bedrooms</p>
                            <p class="d-flex align-items-center m-0"><i class="fas fa-bath me-2"></i>{{ $property->bathrooms }} Bathrooms</p>
                            <p class="d-flex align-items-center m-0"><i class="fas fa-ruler-combined me-2"></i>{{ $property->size }} sq ft</p>
                            <p class="d-flex align-items-center m-0"><i class="fas fa-dollar me-2"></i>{{ $property->price }} taka</p>
                        </div>
                        
                        @if(auth()->user()->role === 'bidder')
                            <div class="mt-3">
                                <p class="m-0"><strong>Highest Bid:</strong> &#2547;{{ $property->bids->first() ? $property->bids->first()->bid_amount : 'No bids yet' }}</p>
                                <p class="m-0">
                                    <strong>Your Last Bid:</strong> &#2547;
                                    @php
                                        $lastBid = $property->bids->where('bidder_id', auth()->id())->sortByDesc('created_at')->first();
                                    @endphp
                                    {{ $lastBid ? $lastBid->bid_amount : 'You haven\'t bid yet' }}
                                </p>

                                <form action="{{ url('/properties/bid/' . $property->id) }}" method="POST" class="mt-2">
                                    @csrf
                                    <div class="mb-2">
                                        <label for="bid_amount" class="form-label">Your Bid</label>
                                        <input type="number" class="form-control" id="bid_amount" name="bid_amount" min="{{ $property->bids->first() ? $property->bids->first()->bid_amount + 1 : $property->min_bid }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-gavel me-2"></i>Place Bid</button>
                                </form>
                            </div>
                        @endif

                        <a href="{{ url('/properties/' . $property->id) }}" class="btn btn-primary btn-sm mt-auto align-self-start"><i class="fas fa-info-circle me-2"></i>View Details</a>
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
@endsection
