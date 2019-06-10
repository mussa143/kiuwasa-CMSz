@extends('layouts.dashboard')
@section('page_heading','CUSTOMERS')
@section('section')
<div class="row">
<a href="" class='btn btn-primary'>Add new Customer</a>
	<div class="col-md-8 col-md-offset-2">
    <h3>Registered Customers</h3>
    <div class="card-body">
     <div class="table-responsive">
    <table class="table table-striped table-hover">
	<thead class=" text-primary">
		<tr>
			<th>S/N</th>
			<th>Name</th>
			<th>Address</th>
            <th>zone</th>
            <th>Action</th>
		</tr>
	</thead>
	<tbody>
    @foreach($customers as $customer)
		<tr>
			<td>{{ $customer->id}}</td>
			<td>{{ $customer->cname}}</td>
			<td>{{ $customer->adress}}</td>
            <td>{{ $customer->zone}}</td>
            <td>
            <a href="" class='btn btn-success btn-xs'>view</a>
            <a href="" class='btn btn-warning btn-xs'>edit</a>
            <a href="" class='btn btn-danger btn-xs'>delete</a>
            </td>
		</tr>
    @endforeach
	</tbody>
</table>
</div>
</div>
	</div>
	
</div>            
            
@stop
