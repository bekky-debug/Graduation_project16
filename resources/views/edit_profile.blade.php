@extends('app.layout')
@section('title', 'BlockWise - edit_profile')
@section('content')
    <div class="container-xxl">
        <div class="container py-5 wow fadeInUp" data-wow-delay="0.1s">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="text-center mb-1">
                <div class="profile-card">
                    <h3>Edit profile</h3>
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf @method('PUT')

                        <div class="form-group">
                            <i class="bi bi-person"></i>
                            <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ auth()->user()->name }}">
                        </div>

                        {{-- <div class="form-group">
                            <i class="bi bi-envelope"></i>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ auth()->user()->email }}">
                        </div> --}}

                        <div class="form-group">
                            <i class="bi bi-lock"></i>
                            <input type="password" name="password" class="form-control" placeholder="New Password (leave blank to keep current)">
                        </div>

                        <div class="form-group">
                            <i class="bi bi-telephone"></i>
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ auth()->user()->phone }}">
                        </div>

                        <button type="submit" class="btn btn-custom">Save Changes</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
   @endsection
