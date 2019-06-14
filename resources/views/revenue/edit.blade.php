@extends('layouts.dashboard')
@section('page_heading','Revenue Payment edit')
@section('section')
<a href="{{ route('revenue')}}" class='btn btn-primary'>BACK</a>
      <div class="col-md-8">
      @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif


      <form action="{{ route('revenue.update',$revenues->id)}}" method='POST'>
      @method('PATCH')
        @csrf
        <label for="type">Revenue Type</label>
        <input type="text" name="type" class="form-control" value="{{$revenues->type}}">
      <label for="amount">Amount ( in TSH )</label>
      <input type="text" name='amount' class="form-control" value="{{$revenues->amount}}"> 
     <label for="customer">Customer Name</label>
     <input type="text" name="customer" class="form-control" value="{{$revenues->customer}}"> <br><br>
      <input type="submit" class="btn btn-primary" value="ADD RECORD">
      <input type="reset" class="btn btn-warning pull-right" value="CANCEL">
      </form>
      </div>            
            
@stop