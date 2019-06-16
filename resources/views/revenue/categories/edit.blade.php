@extends('layouts.blank')

@section('content')
      <div class="col-md-8">
      @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
      <form action="{{ route('rcategory.update')}}" method='POST'>
      @method('PATCH')
        @csrf
      <input type="text" name="name" value="Category Name" class="form-control"> <BR>
      <textarea type="text" name="description" value="Category Description" class="form-control"></textarea><br>
      <input type="submit" class="btn btn-primary" value="ADD">
      <input type="reset" class="btn btn-warning pull-right" value="CANCEL">
      </form>
      </div>            
            
@stop