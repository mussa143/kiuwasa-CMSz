@extends('layouts.dashboard')
@section('page_heading','Water Supply Zone')
@section('section')
<div class="row">
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
<a href="{{ route('zone.create')}}" class='btn btn-primary'>Add new Zone</a>
	<div class="col-sm-12">
    <h3>Available Zones</h3>
    <div class="card-body">
     <div class="table-responsive">
     <table class="table table-bordered" style="width:80%">
	<thead class=" text-primary">
		<tr>
			<th>S/N</th>
			<th>Zone Name</th>>
            <th>Action</th>
		</tr>
	</thead>
	<tbody>
    @foreach($zones as $zone)
		<tr>
			<td>{{ $zone->id}}</td>
			<td>{{ $zone->zname}}</td>
            <td style="width:20%">
            <a href="{{ route('zone.show', $zone->id) }}" class='btn btn-success pull-right fa fa-play btn-s'> view</a>
            <a href="{{ route('zone.edit', $zone->id) }}" class='btn btn-warning pull-right fa fa-edit btn-s'> edit</a>
			<td style="width:10%">
            <form action="{{ route('zone.destroy', $zone->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger fa fa-eraser btn-s" type="submit">Delete</button>
                </form></td>
            </td>
		</tr>
    @endforeach
	</tbody>
</table>
</div>
</div>
	</div><br>
	
</div>            
            
@stop
