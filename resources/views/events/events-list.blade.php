@extends('layout')

@section('content')
<main class="event-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Event Listing</div>
                    <div class="card-body">
    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>Upcoming Events</h1>
            <a href="{{ route('event-add') }}" class="btn btn-success">Add New Event</a>

            @foreach($upcomingEvents as $event)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-heading">
                            <a href="{{ route('event-view', $event->id) }}">{{ $event->title }}</a>
                        </h3>
                        <small>{{ $event->address }}</small>
                    </div>
                    <div class="panel-body">
                        <div class="">
                            <strong>Start date: </strong>{{$event->start_date}}
                            <br>
                            <strong>End date: </strong>{{$event->end_date}}
                            <br>
                            {{--<strong>Created by: </strong><a href="#">{{$event->creator->name}}</a>--}}
                        </div>
                        <div class="">
                            <p>{{$event->description}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>Past Events</h1>

            @if(count($pastEvents) == 0)
                <h1>No past event</h1>
            @else
                @foreach($pastEvents as $event)
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-heading">
                                <a href="{{ route('event-view', $event->id) }}">{{ $event->title }}</a>
                            </h3>
                            <small>{{ $event->address }}</small>
                        </div>
                        <div class="panel-body">
                            <div class="">
                                <strong>Start date: </strong>{{$event->start_date}}
                                <br>
                                <strong>End date: </strong>{{$event->end_date}}
                                <br>
                                {{--<strong>Created by: </strong><a href="#">{{$event->creator->name}}</a>--}}
                            </div>
                            <div class="">
                                <p>{{$event->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@stop

</div>
                </div>
            </div>
        </div>
    </div>