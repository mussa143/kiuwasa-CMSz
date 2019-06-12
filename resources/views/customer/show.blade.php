@extends('layouts.dashboard')
@section('page_heading','Customer Details')
@section('section')
<div class="col-md-8">
      @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
      <form action="{{ route('customer.update',$customers->id)}}" method="post">
      @method('Put')
        @csrf
        <label for="cname">Name:</label>
      <input type="text" name="cname" Value="{{$customers->cname}}" class="form-control"> <BR>
      <label for="address">Address:</label>
      <input type="text" name="adress" value="{{$customers->adress}}" class="form-control"> <BR>
      <label for="cname">Zone:</label>
      <input type="text" name="zone" value="{{$customers->zone}}" class="form-control"> <BR>
      <a href="{{route('customer.edit',$customers->id)}}" class="btn btn-primary" >UPDATE</a>
      <a href="{{route('customer.destroy',$customers->id)}}" class="btn btn-danger pull-right" >DELETE</a>
            </form>
      </div>                 
            
@stop