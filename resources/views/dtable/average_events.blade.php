@extends('layout')
@section('content')
<br>
<div class="container">
    <h3>Statistics</h3>
    <br>
    <table class="table table-bordered table-striped">
        <tr>
            <td>Average events count created by the users : {{ $event_avg }}</td>
        </tr>
    </table>
    <h4>The average of each user</h4>
    <table class="table table-bordered table-striped">
        <tr>
            <th>User</th>
            <th>Average count of event</th>
        </tr>
        @if(count($user_events) == 0)
        <tr>
            <td colspan="2"></td> <!-- cusom msg-->
            @else
            @foreach($user_events as $event)
        <tr>
            <td>{{ $event->first_name }}</td>
            <td>{{ count($event->event) }}</td>
        </tr>
        @endforeach
        @endif
    </table>
</div>
@endsection