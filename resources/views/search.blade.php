<!DOCTYPE html>
    <html>
    <head>
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Live Search</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    </head>
    <body>
    <div class="container">
    <div class="row">
    <div class="panel panel-default">
    <div class="panel-heading">
    <h3>Customers Search By Zone</h3>
    </div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
     </div>
     <div class="table-responsive">
      <h3 align="center">Total Data : <span id="total_records"></span></h3>
    <table class="table table-bordered table-hover">
    <thead>
    <tr>
    <th>ID</th>
    <th>Customer Name</th>
    <th>Phone</th>
    <th>Account Number</th>
    <th>Address</th>
    <th>Zone</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    <script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ url('/search') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>

    </body>
    </html>