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
  <h2>Teachers Applications list</h2>
  <br>
  <table class="table">
    <thead>
      <tr>
        <th>Fullname</th>
        <th>Email</th>
        <th>First Preference</th>
        <th>Second Preference</th>
        <th>Active</th>
        <th>Show</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>


    <tbody>
      @foreach($teachers as $rows)
      <tr>
        <td>{{ $rows->name}}</td>
        <td>{{ $rows->email}}</td>
        @foreach($rows->subjects as $sub)
        <td>{{ $sub->subject }}#{{$sub->class->subject_id}}</td>
        @endforeach

        <td>{{ $rows->active ==1 ? 'true': 'false'}}</td>
        <td><a href="showTeacher/{{ $rows->id}}">Show</a></td>
        <td><a href="editTeacher/{{ $rows->id}}">Edit</a></td>
        <td><a href="deleteTeacher/{{ $rows->id}}">Delete</a></td>
      </tr>
      @endforeach

    </tbody>
  </table>

</div>


@endsection