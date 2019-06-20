@extends('layouts.blank')
@section('content')


<div class="row">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="{{ route('expenditure.create')}}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-600">
                      <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">New Record</span>
                  </a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  <a href="/expenditure" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-600">
                      <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">back</span>
                  </a>

</div>
<hr class="devider">
      <div class="col-md-8">
      @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
      <form action="{{ route('expenditure.store')}}" method='POST'>
      @method('POST')
        @csrf
     <label for="type">Spent For:</label>
      <select name='type' placeholder="Select Revenue category" class="form-control fa fa-dropdown">
      <option value="">Select here...</option>
      @foreach($rows as $list2)
      <option value="{{$list2->exname}}">{{$list2->exname}}</option>
      @endforeach
      </select>
     <br>
     <label for="amount">Amount</label>
      <input type="decimal" name="amount" placeholder="Enter the Amount in Tshs" class="form-control"> <BR>
      <label for="monthy">Monthy</label>
        <input type="text" name="monthy" value="{{date('F Y')}}" class="form-control"> <BR>
        
      <input type="hidden" name="staff" Value="{{Auth::user()->name}}" class="form-control"> <BR>
    
      <input type="submit" class="btn btn-primary" value="SUBMIT">
      <input type="reset" class="btn btn-info pull-right" value="CANCEL">
      </form>
      </div>            
            
@stop