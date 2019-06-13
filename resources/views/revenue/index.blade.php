@extends('layouts.dashboard')
@section('page_heading','Revenue')
@section('section')
<div class="row">
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
<a href="{{ route('revenue.create')}}" class='btn btn-primary'>Add Revenue Records</a>
<a href="{{ route('rcategory.index')}}" class='btn btn-primary'>Categories</a>
<a href="{{ route('rcategory.index')}}" class='btn btn-primary'>Unpaid Bills</a>
<div class="col-sm-12">
    <h3>Collected Revenue</h3>
    <div class="card-body">
     <div class="table-responsive">
	 <table class="table table-bordered" style="width:80%">
	<thead class=" text-primary">
		<tr>
			<th>S/N</th>
			<th>Revenue Category</th>
			<th>Revenue Amount</th>
            <th>Revenue Payer/Customer</th>
            <th>Action</th>
		</tr>
	</thead>
	<tbody>
    @foreach($revenues as $revenue)
		<tr>
			<td>{{ $revenue->id}}</td>
			<td>{{ $revenue->type}}</td>
			<td>{{ $revenue->amount}}</td>
            <td>{{ $revenue->customer}}</td>
            <td>
            <a href="{{ route('revenue.show', $revenue->id) }}" class='btn btn-success pull-right fa fa-play btn-s'> view</a>
            <a href="{{ route('revenue.edit', $revenue->id) }}" class='btn btn-warning pull-right  fa fa-edit btn-s'> edit</a>
			<td>
			<form action="{{ route('revenue.destroy', $revenue->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger fa fa-eraser btn-s" type="submit"> Delete</button>
                </form>
			</td>

            </td>
		</tr>
    @endforeach
	</tbody>
</table>
</div>
{{ $revenues->links() }}
</div>
	</div><br>
	
</div>            
            
@stop
