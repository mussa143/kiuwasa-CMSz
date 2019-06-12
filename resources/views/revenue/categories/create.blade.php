@extends('layouts.dashboard')
@section('page_heading','Add Revenue Categories')
@section('section')
      <div class="col-md-8">
      @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
      <form action="{{ route('rcategory.store')}}" method='POST'>
      @method('POST')
        @csrf
      <input type="text" name="name" placeholder="Category Name" class="form-control"> <BR>
      <textarea type="text" name="description" placeholder="Category Description" class="form-control"></textarea><br>
      <input type="submit" class="btn btn-primary" value="ADD">
      <input type="reset" class="btn btn-warning pull-right" value="CANCEL">
      </form>
      </div>            
            
@stop