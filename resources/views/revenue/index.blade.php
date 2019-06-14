@extends('layouts.dashboard')
@section('page_heading','Revenue')
@section('section')
<div class="row">
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
@if(Auth::user('type')=='admin')  
<a href="{{ route('revenue.create')}}" class='btn btn-primary'>Add Revenue Records</a>
@endif
<a href="{{ route('rcategory.index')}}" class='btn btn-primary'>Categories</a>
<a href="{{ route('revenue')}}" class='btn btn-primary'>View All</a>
<div class="col-md-4 col-md-offset-2">
<form action="/revsearch" method="HEAD">
                        @method('HEAD')
                          @csrf
                        <div class="input-group custom-search-form">
                                <input type="search" name="search" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                        </form>
                            </span>
                            </div>
</div>
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
            @if(Auth::user('type')=='admin')  
            <a href="{{ route('revenue.edit', $revenue->id) }}" class='btn btn-warning pull-right  fa fa-edit btn-s'> edit</a>
			@endif
            @if(Auth::user('type')=='admin')  
            <td>
			<form action="{{ route('revenue.destroy', $revenue->id)}}" method="post">
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
{{ $revenues->links() }}
</div>
	</div><br>
	
</div>            
            
@stop
