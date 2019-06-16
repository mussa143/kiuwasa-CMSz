@extends('layouts.blank')

@section('content')
      <div class="col-md-8">
      @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
      <form action="{{ route('zone.update',$zones->id)}}" method='POST'>
      @method('PATCH')
        @csrf
        <label for="zname">Enter the Zone name:</label>
      <input type="text" name="zname" value="{{$zones->zname}}" class="form-control"> <BR>
      <input type="submit" class="btn btn-primary" value="UPDATE">
      <input type="reset" class="btn btn-warning pull-right" value="CLEAR">
      </form>
      </div>            
            
@stop