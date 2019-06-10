@extends('layouts.dashboard')
@section('page_heading','CREATE CUSTOMERS')
@section('section')
      <div class="col-md-8">
      @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
      <form action="{{ url('cusreg')}}" method="GET">
      <input type="text" name="cname" placeholder="Customer Name" class="form-control"> <BR>
      <input type="text" name="adress" placeholder="Customer Address" class="form-control"> <BR>
      <input type="text" name="zone" placeholder="Customer Zone" class="form-control"> <BR>
      <input type="submit" class="btn btn-primary" value="SUBMIT">
      <input type="reset" class="btn btn-info pull-right" value="CANCEL">
      </form>
      </div>            
            
@stop
