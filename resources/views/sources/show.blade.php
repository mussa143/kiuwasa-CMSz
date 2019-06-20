@extends('layouts.blank')
@section('page_heading','Customer Details')
@section('content')
<div class="col-md-8">
      @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
<div class="row">
<a href="/source" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-600">
                      <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Back</span>
                  </a>
</div> 
<div class="row">
<div class="col-md-8">
<table style="width:100%">
            <thead>
            <h3 class="text-primary">{{ $sources->sname }}'s Details</h3>
            </thead>
            <tbody style="font-size:150%" >
                  <tr style="border-bottom: 1px solid gray">
                  <td>
                    <label style="color:black;font-weight:600;" for="name">Name: </label>
                  </td>
                  <td>{{ $sources->sname }}</td>
                  </tr>
                  <tr style="border-bottom: 1px solid gray">
                  <td>
                    <label style="color:black;font-weight:600;" for="phone">Source Type: </label>
                  </td>
                  <td>{{ $sources->type }}</td>
                  </tr>
                  <tr style="border-bottom: 1px solid gray">
                  <td>
                    <label style="color:black;font-weight:600;" for="acc">Source Capacity: </label>
                  </td>
                  <td>{{ $sources->qty }}</td>
                  </tr>
                  
                  <tr class="disabled">
                  <td>
                  <br>
                  </td>
                  <td>
                  <br>
                  </td>
                  </tr>
                  <tr>
                  <td>
                  <a href="{{ route('source.edit', $sources->id) }}" class='btn btn-primary pull-right fa fa-edit btn-s'> edit</a>
                  </td>
                  <td>
                  <form action="{{ route('source.destroy', $sources->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger fa fa-eraser btn-s" type="submit">Delete</button>
                </form>
                  </td>
                  </tr>
            </tbody>

      </table>
</div>
<div class="col-md-4">
<h5> {{ $sources->sname}}'s Production per monthy</h5>
<table class="table table-hover">
      <thead>
      <th>Month</th> <th>Quantity</th>
     </thead>
     <tbody>
     @foreach($monthy as $data)
     <tr>
     <td>
     {{ $data->monthy}}
     </td>
     <td>
     {{ $data->capacity}}
     </td>
     </tr>
     @endforeach
     
     </tbody>
      </table>
</div>
</div> 
      
      </div>                 
            
@stop