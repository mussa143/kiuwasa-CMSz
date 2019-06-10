@extends('layouts.dashboard')
@section('page_heading','Edit Customer')
@section('section')
<div class="col-md-8">
      @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
      <form action="{{ route('editcus'),$customers->id}}" method="GET">
      <input type="text" name="cname" placeholder="{{$customers->cname}}" class="form-control"> <BR>
      <input type="text" name="adress" placeholder="{{$customers->adress}}" class="form-control"> <BR>
      <input type="text" name="zone" placeholder="{{$customers->zone}}" class="form-control"> <BR>
      <input type="submit" class="btn btn-primary" value="SUBMIT">
      <input type="reset" class="btn btn-info pull-right" value="CANCEL">
      </form>
      </div>                 
            
@stop