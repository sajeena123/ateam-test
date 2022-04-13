@extends('layout')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('resources/css/bootstrap4-glyphicons/css/bootstrap-glyphicons.css')}}">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form action="{{ route('register.post') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="first_name" class="form-control" name="first_name" value="{{old('first_name')}}" required autofocus>
                                    @if ($errors->has('first_name'))
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="last_name" class="form-control" value="{{old('last_name')}}" name="last_name" required autofocus>
                                    @if ($errors->has('last_name'))
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                                <div class="col-md-6">
                                    <input type="radio" value="Male" id="male" name="gender">
                                    <label for="male">Male</label>
                                    <input type="radio" value="Female" id="female" name="gender">
                                    <label for="female">Female</label>
                                    @if ($errors->has('gender'))
                                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>
                                <div class='col-md-6 input-group date' id='CalendarDateTime'>
                                    <input type="text" id="dob" readonly class="form-control" value="{{old('date_of_birth')}}" name="date_of_birth" required autofocus>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    @if ($errors->has('date_of_birth'))
                                    <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" value="{{old('email')}}" name="email" required autofocus>
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
    $('#CalendarDateTime').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
</script>
@endsection