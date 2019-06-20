@extends('layouts.blank')

@section('content')
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
      <select name='type' placeholder="Select Revenue category" class="form-control fa fa-dropdown">
      <option value="">{{ $revenues->type}}</option> <h5></h5>
      @foreach($category as $list)
      <option value="{{$list->name}}">{{$list->name}}</option>
      @endforeach
      </select><br><br>
      <label for="amount">Amount ( in TSH )</label>
      <input type="text" name='amount' class="form-control" value="{{ $revenues->amount}}"> <br><br>
      <label for="amount">Payer / Coustomer</label>
      <select name='customer' placeholder="Payer" class="form-control fa fa-dropdown">
      @foreach($cus as $list2)
      <option value="{{$list2->cname}}">{{$list2->cname}}</option>
      @endforeach
      </select><br><br><br><br>
      <input type="submit" class="btn btn-primary" value="EDIT RECORD">
      <input type="reset" class="btn btn-warning pull-right" value="CANCEL">
      </form>
      </div>            
            
@stop