@extends('layouts.blank')

@section('content')
      <div class="col-md-8">
      @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
      <form action="{{ route('ex.store')}}" method='POST'>
      @method('POST')
        @csrf
        <label for="exname">Enter the Zone name:</label>
      <input type="text" name="exname" placeholder="expenditure type Name" class="form-control"> <BR>
      <input type="submit" class="btn btn-primary" value="ADD">
      <input type="reset" class="btn btn-warning pull-right" value="CANCEL">
      </form>
      </div>            
            
@stop