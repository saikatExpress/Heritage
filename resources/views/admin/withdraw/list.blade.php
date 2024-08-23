@extends('layout.app')

@section('content')
<div class="container">
    <h2>Your Withdraw Requests</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($withdrawRequests as $request)
            <tr>
                <td>{{ $request->id }}</td>
                <td>{{ $request->amount }}</td>
                <td>{{ ucfirst($request->status) }}</td>
                <td>{{ $request->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
