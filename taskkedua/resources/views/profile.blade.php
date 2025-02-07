@extends('index')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3>User Profile</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $user->username }}</h5>
                    <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="card-text"><strong>Phone Number:</strong> {{ $user->no_hp }}</p>
                    <p class="card-text"><strong>Address:</strong> {{ $user->address }}</p>
                    <p class="card-text"><strong>Major:</strong> {{ $user->jurusan }}</p>
                    <p class="card-text"><strong>Status:</strong> {{ $user->status == 1 ? 'Active' : 'Inactive' }}</p>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
