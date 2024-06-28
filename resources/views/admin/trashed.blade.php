@extends('layouts.adminDashboard')


@section('content')

<hr>
<br>
<div class="container">
    <h2>Teachers Drop List</h2>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Fullname</th>
                <th>Email</th>
                <th>First Preference</th>
                <th>Second Preference</th>
                <th>Active</th>
                <th>Details</th>
                <th>restore</th>
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
                <td><a href="showTeacher/{{ $rows->id}}">Details</a></td>
                <td><a href="restore/{{ $rows->id}}">Restore</a></td>
                <td><a href="finalDelete/{{ $rows->id}}">Drop</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>


@endsection