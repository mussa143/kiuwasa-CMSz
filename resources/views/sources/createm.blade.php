@extends('layouts.blank')

@section('content')
      <div class="col-md-8">
      @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
<div class="row">
<h4>Add Water Production for A month</h4>
<hr class="devider">
</div>

      <form action="{{route('prod.store')}}" method='POST'>
      @method('POST')
        @csrf
        <select name="source" id="source" class="form-control">
        <option value="">Select Watersource</option>
        @foreach($waters as $water)
        <option value="{{ $water->id }}">{{ $water->sname}}</option>
        @endforeach
        </select><br>
        <select name="monthy" id="monthy" class="form-control">
        <option value="">Select a Monthy</option>
        <option value="January 2019">January</option>
        <option value="February 2019">February</option>
        <option value="March 2019">March</option>
        <option value="April 2019">April</option>
        <option value="May 2019">May</option>
        <option value="June 2019">june</option>
        <option value="January 2019">July</option>
        <option value="August 2019">August</option>
        <option value="September 2019">September</option>
        <option value="October 2019">October</option>
        <option value="November 2019">November</option>
        <option value="Decembers 2019">December</option>
        </select><br>
      <input type="text" name="capacity" placeholder="Source Capacity" class="form-control"><br>
      <input type="submit" class="btn btn-primary" value="ADD">
      <input type="reset" class="btn btn-warning pull-right" value="CANCEL">
      </form>
      </div>            
            
@stop