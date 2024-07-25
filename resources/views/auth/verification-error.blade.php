@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
    <p>Please request a new verification link or contact support if you continue to have issues.</p>
    <a href="{{ route('verification.resend') }}" class="btn btn-primary">Request New Verification Link</a>
</div>
@endsection