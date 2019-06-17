@extends('layouts.blank')
@section('content')
      <div class="col-md-8">
      @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
      <form action="{{ route('expenditure.store')}}" method='POST'>
      @method('POST')
        @csrf
      <table>
      <tr>
      <td><input type="text" name="type" placeholder="Customer Name" class="form-control"> <BR></td>
      </tr>
      <tr>
      <td> <input type="text" name="monthy" placeholder="Customer Phone" class="form-control"> <BR></td>
      </tr>
      </table>
      
     
      <input type="text" name="amount" placeholder="Account Number" class="form-control"> <BR>
    
      <input type="submit" class="btn btn-primary" value="SUBMIT">
      <input type="reset" class="btn btn-info pull-right" value="CANCEL">
      </form>
      </div>            
            
@stop