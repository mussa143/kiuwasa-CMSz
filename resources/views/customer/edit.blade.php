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
      <input type="text" name="cname" Value="{{$customers->cname}}" class="form-control" required> <BR>
      <label for="cname">Phone: (not less than ten Digits )</label>
      <input type="text" name="phone" Value="{{$customers->phone}}"  class="form-control" required> <BR>
      <label for="cname">Account #:</label>
      <input type="text" name="acc" Value="{{$customers->acc}}" class="form-control" required> <BR>
      <label for="address">Address:</label>
      <input type="text" name="adress" value="{{$customers->adress}}" class="form-control" required> <BR>
      <label for="zone">Zone:</label>
      <input type="text" name="zone" value="{{$customers->zone}}" class="form-control" required> <BR>
      <input type="submit" class="btn btn-primary" value="SUBMIT">
      <a href="/customer" class="btn btn-info pull-right" >CANCEL</a>
      </form>
      </div>                 
            
@stop