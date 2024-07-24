@extends('layouts.adminDashboard')
@section('content')

@if (session('success'))
<div class="alert alert-success text-center">
    {{ session('success') }}
</div>
@endif

<br><br>
<div class="container">
    <h2>Classes Applications list</h2>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>subject</th>
                <th>teacher</th>
                <th>ageGroup</th>
                <th>price</th>
                <th>start</th>
                <th>end</th>
                <th>capacity</th>
                <th>active</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            @foreach($classes as $rows)
            <tr>
                <td>{{ $rows->subject->subject}}</td>
                <td>{{ $rows->teacher->name}}</td>
                <td>{{ $rows->ageGroup}}</td>
                <td>{{ $rows->price}}</td>
                <td>{{ $rows->start}}</td>
                <td>{{ $rows->end}}</td>
                <td>{{ $rows->capacity}}</td>
                <td>{{ $rows->active == 1 ? 'true': 'false'}}</td>
                <td><a href="showClass/{{ $rows->id}}">Show</a></td>
                <td><a href="editClass/{{ $rows->id}}">Edit</a></td>
                <td><a href="deleteClass/{{ $rows->id}}">Delete</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>

@endsection