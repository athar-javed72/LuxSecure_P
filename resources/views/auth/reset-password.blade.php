@extends('include.master')

@push('styles')
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 fade-in">
            <div class="auth-form">
                <h4 class="mb-3 text-center">Reset Password</h4>
                {{-- Flash Messages --}}
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                {{-- Error Messages --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="fade-in">
                    <form method="POST" action="{{ url('/reset-password') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
