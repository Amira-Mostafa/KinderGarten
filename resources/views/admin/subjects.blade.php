@extends('layouts.adminDashboard')
@section('content')

@if (session('success'))
<div class="alert alert-success text-center">
    {{ session('success') }}
</div>
@endif

<div class="container">
    <h1>Subjects List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Subject</th>
                <th>show</th>
                <th>edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach($subjects as $rows)
            <tr>
                <td>{{$rows->subject}}</td>
                <td><a href="showSubject/{{$rows->id}}">show</a></td>
                <td><a href="editSubject/{{$rows->id}}">edit</a></td>
                <td><a href="deleteSubject/{{$rows->id}}">delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>

@endsection