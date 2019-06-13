@extends('layouts.dashboard')
@section('page_heading','Water Sources')
@section('section')
<div class="row">
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
<a href="{{ route('source.create')}}" class='btn btn-primary'>Add new Water Source</a>
	<div class="col-sm-12">
    <h3>Available Water Sources</h3>
    <div class="card-body">
     <div class="table-responsive">
     <table class="table table-bordered" style="width:80%">
	<thead class=" text-primary">
		<tr>
			<th>S/N</th>
			<th>Source Type</th>
			<th>Source Name</th>
            <th>Source Capacity (litres or m3)</th>
            <th>Capacity time</th>
            <th>Action</th>
		</tr>
	</thead>
	<tbody>
    @foreach($sources as $source)
		<tr>
			<td>{{ $source->id}}</td>
			<td>{{ $source->type}}</td>
			<td>{{ $source->sname}}</td>
            <td>{{ $source->qty}}</td>
            <td>{{ $source->updated_at}}</td>
            <td style="width:20%">
            <a href="{{ route('source.show', $source->id) }}" class='btn btn-success pull-right fa fa-play btn-s'> view</a>
            <a href="{{ route('source.edit', $source->id) }}" class='btn btn-warning pull-right fa fa-edit btn-s'> edit</a>
			<td><form action="{{ route('source.destroy', $source->id)}}" method="post">
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
{{ $sources->links() }}
</div>
	</div><br>
	
</div>            
            
@stop
