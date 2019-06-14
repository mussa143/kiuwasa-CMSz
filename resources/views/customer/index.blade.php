@extends('layouts.dashboard')
@section('page_heading','CUSTOMERS')
@section('section')
@if(Auth::user('type')=='admin')  
<a href="{{ route('customer.create')}}" class='btn pull-right btn-lg btn-info'>Add new Customer</a>
@endif
<div class="row">
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

	<div class="col-sm-12">
    <h3>Registered Customers</h3>
    <h5>{{ Auth::user()->type }}</h5>
    <div class="card-body">
     <div class="table-responsive">
     <table class="table table-bordered" style="width:80%;margin-right:0;margin-left:0;">
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
            
            <td style="width:20%">
         
        <a href="{{ route('customer.show', $customer->id) }}" class='btn btn-success pull-right  fa fa-play btn-s'> view</a>
        @if(Auth::user('type')=='admin')  
            <a href="{{ route('customer.edit', $customer->id) }}" class='btn btn-warning pull-right fa fa-edit btn-s'> edit</a>
			<td style="width:10%">
            <form action="{{ route('customer.destroy', $customer->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger fa fa-eraser btn-s" type="submit"> Delete</button>
                </form>
            </td>
            @endif
            </td>
		</tr>
    @endforeach
	</tbody>
</table>
</div>
{{ $customers->links() }}
</div>
	</div><br>
	
</div>            
            
@stop
