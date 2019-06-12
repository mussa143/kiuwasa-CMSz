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
	<div class="col-md-8 col-md-offset-2">
    <h3>Available Water Sources</h3>
    <div class="card-body">
     <div class="table-responsive">
    <table class="table table-striped table-hover">
	<thead class=" text-primary">
		<tr>
			<th>S/N</th>
			<th>Source Type</th>
			<th>Source Name</th>
            <th>Source Capacity (litres or m3)</th>
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
            <td>
            <a href="{{ route('source.show', $source->id) }}" class='btn btn-success btn-xs'>view</a>
            <a href="{{ route('source.edit', $source->id) }}" class='btn btn-warning btn-xs'>edit</a>
			<form action="{{ route('source.destroy', $sources->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-xs" type="submit">Delete</button>
                </form>
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
