@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create File for Pending Requests</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('file.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="file_name">File Name</label>
            <input type="text" class="form-control" name="file_name" id="file_name" required>
        </div>
        <div class="form-group">
            <label for="withdraw_requests">Select Withdraw Requests</label>
            <select multiple class="form-control" name="withdraw_requests[]" id="withdraw_requests" required>
                @foreach($pendingRequests as $request)
                    <option value="{{ $request->id }}">
                        {{ $request->id }} - Amount: {{ $request->amount }} - User: {{ $request->user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create File</button>
    </form>
</div>
@endsection
