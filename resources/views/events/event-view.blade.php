@extends('layout')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
@section('stylesheets')
<style>
    #map {
        height: 500px;
        width: 100%;
    }
</style>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-8 col-sm-push-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-heading">{{$event->title}}</h3>
            </div>
            <table class="table table-bordered table-hover table-striped">
                <tbody>
                    <tr>
                        <td><strong>Start date:</strong></td>
                        <td>{{$event->start_date}}</td>
                    </tr>
                    <tr>
                        <td><strong>End date:</strong></td>
                        <td>{{$event->end_date}}</td>
                    </tr>
                    <tr>
                        <td><strong>Created by:</strong></td>
                        <td><a href="#">{{$event->creator->first_name}}</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-sm-8 col-sm-push-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-heading">Manage Attendees</h3>
                <br><a href="{{ route('invite',$event->id) }}" class="btn btn-success">Add new attendee</a></a>
                <button style="margin: 5px;" class="btn btn-danger btn-xs delete-all" id="delete-all" data-url="">Delete All</button>
            </div>
            <br> @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif<br>
            @if(count($attendees) == 0)
            <h1>No attendees</h1>
            @else
            <table class="table table-bordered table-hover table-striped">
                <tbody>
                    @foreach($attendees as $key => $attendee)
                    <tr id="tr_{{$attendee->id}}">
                        <td><input type="checkbox" class="checkbox" data-id="{{$attendee->id}}"></td>
                        <td><strong>{{$attendee->email}}</strong></td>
                        <td>
                            <button class="btn btn-danger btn-xs" id="deleteattende" data-id="{{$attendee->id}}" data-toggle="confirmation" type="button">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
    $('#check_all').on('click', function(e) {
        if ($(this).is(':checked', true)) {
            $(".checkbox").prop('checked', true);
        } else {
            $(".checkbox").prop('checked', false);
        }
    });
    $('.checkbox').on('click', function() {
        if ($('.checkbox:checked').length == $('.checkbox').length) {
            $('#check_all').prop('checked', true);
        } else {
            $('#check_all').prop('checked', false);
        }
    });
    $(document).on("click", "#delete-all", function(e) {
        var idsArr = [];
        $(".checkbox:checked").each(function() {
            idsArr.push($(this).attr('data-id'));
        });
        if (idsArr.length <= 0) {
            alert("Please select atleast one record to delete.");
        } else {
            if (confirm("Are you sure, you want to delete the selected attendee?")) {
                var strIds = idsArr.join(",");
                $.ajax({
                    url: "{{ route('invites.multiple-delete') }}",
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: 'ids=' + strIds,
                    success: function(data) {
                        if (data['status'] == true) {
                            $(".checkbox:checked").each(function() {
                                $(this).parents("tr").remove();
                            });
                            alert(data['message']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function(data) {
                        alert(data.responseText);
                    }
                });
            }
        }
    });
    $(document).on("click", "#deleteattende", function(e) {
        if (!confirm("Do you really want to do this?")) {
            return false;
        }
        e.preventDefault();
        var id = $(this).data("id");
        // var id = $(this).attr('data-id');
        var token = $("meta[name='csrf-token']").attr("content");
        var url = e.target;
        $.ajax({
            url: "{{ route('invites.delete') }}",
            type: 'DELETE',
            data: {
                _token: token,
                id: id
            },
            success: function(response) {
                if (response['status'] == true) {
                    var trid = "#tr_" + id;
                    $(trid).remove();
                    alert(response['message']);
                } else {
                    alert('Whoops Something went wrong!!');
                }
            }
        });
        return false;
    });
</script>