@extends('layout.master')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mt-5">
    <h2>Admin Dashboard</h2>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $userCount }}</h5>
                    <p class="card-text">Manage all users.</p>
                    <a href="" class="btn btn-light">View Users</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Roles</div>
                <div class="card-body">
                    <h5 class="card-title">5</h5>
                    <p class="card-text">Manage user roles.</p>
                    <a href="" class="btn btn-light">View Roles</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Permissions</div>
                <div class="card-body">
                    <h5 class="card-title">0</h5>
                    <p class="card-text">Manage permissions.</p>
                    <a href="" class="btn btn-light">View Permissions</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Bids</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $bidCount }}</h5>
                    <p class="card-text">Manage bids.</p>
                    <a href="" class="btn btn-light">View Bids</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Properties</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $propertyCount }}</h5>
                    <p class="card-text">Manage properties.</p>
                    <a href="" class="btn btn-light">View Properties</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
