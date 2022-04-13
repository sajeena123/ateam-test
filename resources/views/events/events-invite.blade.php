@extends('layout')
{{--Disabled csrf for some routes--}}
@section('content')
<main class="event-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Manage Invites</div>
                    <div class="card-body">
                        <form action="{{ route('process') }}" method="post">
                            {{ csrf_field() }}
                            <input type="email" name="email" />
                            <input type="hidden" name="event_id" value="{{ request()->event_id }}" />
                            <button type="submit">Send invite</button>
                        </form>
                        <span class="text-danger">{{$errors->first('email')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    @endsection