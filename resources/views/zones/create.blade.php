@extends('layouts.dashboard')
@section('page_heading','Add Revenue Categories')
@section('section')
      <div class="col-md-8">
      @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
      <form action="{{ route('zone.store')}}" method='POST'>
      @method('POST')
        @csrf
        <label for="zname">Enter the Zone name:</label>
      <input type="text" name="zname" placeholder="Zone Name" class="form-control"> <BR>
      <input type="submit" class="btn btn-primary" value="ADD">
      <input type="reset" class="btn btn-warning pull-right" value="CANCEL">
      </form>
      </div>            
            
@stop