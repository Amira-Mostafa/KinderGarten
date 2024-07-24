@extends('layouts.template')

@section('title')
Teachers Page
@endsection

@section('header')
Contact Us
@endsection

@if (session('success'))
<div class="alert alert-success text-center">
    {{ session('success') }}
</div>
@endif

@section('content')
@include('includes.pageHeader')
@include('includes.contact')
@endsection