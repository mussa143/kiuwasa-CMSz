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
	<div class="col-sm-12">
    <h3>Revenue Categories</h3>
    <div class="card-body">
     <div class="table-responsive">
    <table class="table table-bordered" style="width:80%">
	<thead class=" text-primary">
		<tr>
			<th>S/N</th>
			<th>Category Name</th>
            
		</tr>
	</thead>
	<tbody>
    @foreach($rcategory as $category)
		<tr>
			<td style="width:5%">{{ $category->id}}</td>
			<td>{{ $category->name}}</td>
			
        
            <td style="width:10%">
            <a href="{{ route('rcategory.show', $category->id) }}" class='btn btn-success pull-right btn-s fa fa-edit'> edit</a>
            <td style="width:10%"><form action="{{ route('rcategory.destroy', $category->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-s fa fa-eraser" type="submit"> Delete</button>
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
