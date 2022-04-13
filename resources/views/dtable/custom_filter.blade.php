@extends('layout')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>



@section('content')
<div class="container">
<h3>Events</h3>  <div class="row">
    <div class="form-group col-md-4">
    <h5>Start Date <span class="text-danger"></span></h5>
    <div class="controls">
        <input type="date" name="start_date" id="start_date" class="form-control datepicker-autoclose" placeholder="Please select start date"> <div class="help-block"></div></div>
    </div>
    <div class="form-group col-md-4">
    <h5>End Date <span class="text-danger"></span></h5>
    <div class="controls">
        <input type="date" name="end_date" id="end_date" class="form-control datepicker-autoclose" placeholder="Please select end date"> <div class="help-block"></div></div>
    </div>
    <div class="form-group col-md-4">
    <h5> &nbsp;<span class="text-danger"></span></h5>
    <div class="controls">
    <button type="text" id="filter" class="btn btn-info">Submit</button> <div class="help-block"></div></div>
    </div>
    </div>

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
    </table>
</div>

@endsection

<script>
$(document).ready( function () {
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $('#laravel_datatable').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: "{{ url('dtable-custom-event') }}",
          type: 'GET',
          data: function (d) {
          d.start_date = $('#start_date').val();
          d.end_date = $('#end_date').val();
          }
         },
         columns: [
                  { data: 'id', name: 'id', 'visible': false},
                  { data: 'title', name: 'title' },
                  { data: 'start_date', name: 'start_date' },
                  { data: 'end_date', name: 'end_date' },

               ],
        order: [[0, 'desc']]
  });

});
$(document).on("click","#filter",function() {

    $('#laravel_datatable').DataTable().draw(true);
});
    //alert('test');
    // $('#laravel_datatable').DataTable().draw(true);
//});

</script>
