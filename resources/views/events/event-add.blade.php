@extends('layout')
{{--Disabled csrf for some routes--}}
@section('content')
<main class="event-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add new event</div>
                    <div class="card-body">
                        <form action="{{route('event-save')}}" method="post" id="locationForm">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"></h3>
                                        </div>
                                        <div class="panel-body">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="title">Event title</label>
                                                <input type="text" name="title" id="title" value="{{ old('title')}}" class="form-control" placeholder="Enter the event">
                                                <span class="text-danger">{{$errors->first('title')}}</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">Start date</label>
                                                <input type="date" name="start_date" id="start_date" value="{{ old('start_date')}}"  class="form-control" placeholder="Enter the event start date">
                                                <span class="text-danger">{{$errors->first('start_date')}}</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="title">End date</label>
                                                <input type="date" name="end_date" id="end_date" class="form-control"  value="{{ old('end_date')}}" placeholder="Enter the event end date">
                                                <span class="text-danger">{{$errors->first('end_date')}}</span>
                                            </div>
                                            <button class="btn btn-primary">
                                                <i class="fa fa-save"></i> Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    @endsection