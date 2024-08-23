@extends('layout.app')

@section('content')
<div class="container">
    <h2>Pending Files for Approval</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>File Name</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($files as $file)
            <tr>
                <td>{{ $file->id }}</td>
                <td>{{ $file->file_name }}</td>
                <td>{{ ucfirst($file->status) }}</td>
                <td>{{ $file->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <form action="{{ route('file.approve', $file->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="approved">
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                    <form action="{{ route('file.approve', $file->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="rejected">
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
