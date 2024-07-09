@extends('layouts.adminDashboard')
@section('content')
<hr>
@if (session('success'))
<div class="alert alert-success text-center">
    {{ session('success') }}
</div>
@endif
<br><br>
<div class="container">
    <h2>Testimonial</h2>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>name</th>
                <th>profession</th>
                <th>comment</th>
                <th>Active</th>
                <th>show</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>


        <tbody>
            @foreach($testimonials as $rows)
            <tr>
                <td>{{ $rows->name}}</td>
                <td>{{ $rows->Profession}}</td>
                <td>{{ $rows->comment}}</td>
                <td>{{ $rows->active ==1 ? 'true': 'false'}}</td>
                <td><a href="showTestimonial/{{ $rows->id}}">show</a></td>
                <td><a href="editTestimonial/{{ $rows->id}}">Edit</a></td>
                <td><a href="deleteTestimonial/{{ $rows->id}}">Delete</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>

@endsection