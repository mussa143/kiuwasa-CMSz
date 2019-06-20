@extends('layouts.blank')

@section('content')
      <div class="col-md-8">
      @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
      <form action="{{ route('source.update',$data->id)}}" method='POST'>
      @method('PATCH')
        @csrf
        <select name="type" id="type" class="form-control">
        <option value="">Select Watersource Type</option>
        <option value="Bore Hole (BH)">Bore Hole (BH)</option>
        <option value="River">River</option>
        </select><br>
      <input type="text" name="sname" Value="{{$data->sname}}" class="form-control"> <BR>
      <input type="text" name="capacity" Value="{{$data->qty}}" class="form-control"><br>
      <input type="submit" class="btn btn-primary" value="ADD">
      <input type="reset" class="btn btn-warning pull-right" value="CANCEL">
      </form>
      </div>            
            
@stop