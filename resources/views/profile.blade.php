@extends('layouts.app')

@section('title', 'Profile | Tasks for Today')

@section('content')
    <div class="mb-4">
        <p class="text-primary fw-semibold mb-1">User information</p>
        <h1 class="display-6 fw-bold mb-0">Profile</h1>
    </div>

    @if ($user)
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 p-md-5">
                <dl class="row mb-0">
                    <dt class="col-sm-4">Full name</dt>
                    <dd class="col-sm-8">{{ $user->full_name }}</dd>
                    <dt class="col-sm-4">Username</dt>
                    <dd class="col-sm-8">{{ $user->username }}</dd>
                    <dt class="col-sm-4">Email</dt>
                    <dd class="col-sm-8 mb-0">{{ $user->email }}</dd>
                </dl>
            </div>
        </div>
    @else
        <div class="alert alert-info">No user exists in the database.</div>
    @endif
@endsection
