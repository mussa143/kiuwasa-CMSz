@extends('layouts.blank')
@section('page_heading','Edit Customer')
@section('content')
<div class="col-md-8">
      @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
      <form action="{{ route('customer.update',$customers->id)}}" method="post">
      @method('PATCH')
        @csrf
        <label for="cname">Name:</label>
      <input type="text" name="cname" Value="{{$customers->cname}}" class="form-control"> <BR>
      <label for="address">Address:</label>
      <input type="text" name="adress" value="{{$customers->adress}}" class="form-control"> <BR>
      <label for="zone">Zone:</label>
      <input type="text" name="zone" value="{{$customers->zone}}" class="form-control"> <BR>
      <input type="submit" class="btn btn-primary" value="SUBMIT">
      <input type="reset" class="btn btn-info pull-right" value="CANCEL">
      </form>
      </div>                 
            
@stop