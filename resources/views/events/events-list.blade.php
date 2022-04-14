@extends('layout')

@section('content')
<main class="event-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Event Listing</div>
                    <div class="card-body">
                    <div class="row justify-content-center">
        <div class="col-sm-8 col-sm-push-2">

        <div style="float: right;"><a href="{{ route('event-add') }}" class="btn btn-success">Add New Event</a></div><br>
            <h1>Upcoming Events</h1>
            <br>
            <table class="table table-bordered table-striped" id="laravel_datatable">
       <thead>
          <tr>
             <th>ID</th>
             <th>Title</th>
             <th>Start Date</th>
             <th>End Date</th>

          </tr>
       </thead>
       @if(count($upcomingEvents) == 0)
       <tr>
             <td colspan="4" align="center">No upcoming events</td> </tr>
            @else
            @foreach($upcomingEvents as $key=> $event)

            <tr>
             <td>{{ ++$key}}</td>
             <td><a href="{{ route('event-view', $event->id) }}">{{ $event->title }}</a></td>
             <td>{{$event->start_date}}</th>
             <td>{{$event->end_date}}</td>

          </tr>

            @endforeach
            @endif
            </table>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-8 col-sm-push-2">
            <h1>Past Events</h1>
           <br>
            <table class="table table-bordered table-striped" id="laravel_datatable">
       <thead>
          <tr>
             <th>ID</th>
             <th>Title</th>
             <th>Start Date</th>
             <th>End Date</th>

          </tr>
       </thead>
       @if(count($pastEvents) == 0)
       <tr>
             <td colspan="4" align="center">No upcoming events</td> </tr>
            @else
            @foreach($pastEvents as $key=> $event)

            <tr>
            <td>{{ ++$key}}</td>
             <td><a href="{{ route('event-view', $event->id) }}">{{ $event->title }}</a></td>
             <td>{{$event->start_date}}</th>
             <td>{{$event->end_date}}</td>

          </tr>

            @endforeach
            @endif
            </table>
        </div>
    </div>
@stop

</div>
                </div>
            </div>
        </div>
    </div>