@extends('layouts.dashboard')
@section('page_heading','Water Sources')
@section('section')
<div class="row">
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
<a href="{{ route('rcategory.create')}}" class='btn btn-primary'>New Category</a>
	<div style="padding-left:30px">
    <h3>Revenue Categories</h3>
    <div class="card-body">
     <div class="table-responsive">
    <table class="table table-striped table-hover">
	<thead class=" text-primary">
		<tr>
			<th>S/N</th>
			<th>Category Name</th>
            <th>Description</th>
		</tr>
	</thead>
	<tbody>
    @foreach($rcategory as $category)
		<tr>
			<td>{{ $category->id}}</td>
			<td>{{ $category->name}}</td>
			<td>{{ $category->description}}</td>
        
            <td>
            <a href="{{ route('rcategory.show', $category->id) }}" class='btn btn-success btn-s fa fa-edit'>edit</a>
            <td><form action="{{ route('rcategory.destroy', $category->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-s fa fa-delete" type="submit">Delete</button>
                </form></td>
			
            </td>
		</tr>
    @endforeach
	</tbody>
</table>
</div>
{{ $rcategory->links() }}
</div>
	</div><br>
	
</div>            
            
@stop
