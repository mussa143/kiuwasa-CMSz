@extends('layouts.blank')

@section('content')
      <div class="col-md-8">
      @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
      <form action="{{ route('revenue.store')}}" method='POST'>
      @method('POST')
        @csrf
        <label for="type">Revenue Type</label>
      <select name='type' placeholder="Select Revenue category" class="form-control fa fa-dropdown">
      <option value="">Select Category Name</option>
      @foreach($category as $list)
      <option value="{{$list->name}}">{{$list->name}}</option>
      @endforeach
      </select><br><br>
      <label for="amount">Amount ( in TSH )</label>
      <input type="text" name='amount' class="form-control" placeholder=""> <br><br>
      <select name='customer' placeholder="Select Revenue category" class="form-control fa fa-dropdown">
      @foreach($cus as $list2)
      <option value="{{$list2->cname}}">{{$list2->cname}}</option>
      @endforeach
      </select><br><br><br><br>
      <input type="submit" class="btn btn-primary" value="ADD RECORD">
      <input type="reset" class="btn btn-warning pull-right" value="CANCEL">
      </form>
      </div>            
            
@stop