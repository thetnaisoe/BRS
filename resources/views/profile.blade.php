
@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header">
            <h2>Profile</h2>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> <span class="ml-2">{{ $user->name }}</span></p>
            <p><strong>Email:</strong> <span class="ml-2">{{ $user->email }}</span></p>
            <p><strong>Role:</strong> <span class="ml-2">{{ $user->isLibrarian() ? 'Librarian' : 'Reader' }}</span></p>
        </div>
    </div>
</div>
@endsection

