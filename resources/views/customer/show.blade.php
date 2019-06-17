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
<a href="/customer" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-600">
                      <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Back</span>
                  </a>
</div>  
      <table style="width:80%">
            <thead>
            <h3 class="text-primary">{{ $customers->cname }}'s Details</h3>
            </thead>
            <tbody style="font-size:150%" >
                  <tr style="border-bottom: 1px solid gray">
                  <td>
                    <label style="color:black;font-weight:600;" for="name">Name: </label>
                  </td>
                  <td>{{ $customers->cname }}</td>
                  </tr>
                  <tr style="border-bottom: 1px solid gray">
                  <td>
                    <label style="color:black;font-weight:600;" for="phone">Phone: </label>
                  </td>
                  <td>{{ $customers->phone }}</td>
                  </tr>
                  <tr style="border-bottom: 1px solid gray">
                  <td>
                    <label style="color:black;font-weight:600;" for="acc">Account Number: </label>
                  </td>
                  <td>{{ $customers->acc }}</td>
                  </tr>
                  <tr style="border-bottom: 1px solid gray">
                  <td>
                    <label style="color:black;font-weight:600;" for="Address">Address: </label>
                  </td>
                  <td>{{ $customers->adress }}</td>
                  </tr>
                  <tr style="border-bottom: 1px solid gray">
                  <td>
                    <label style="color:black;font-weight:600;" for="Zone">Zone: </label>
                  </td>
                  <td>{{ $customers->zone }}</td>
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
                  <a href="{{ route('customer.edit', $customers->id) }}" class='btn btn-primary pull-right fa fa-edit btn-s'> edit</a>
                  </td>
                  <td>
                  <form action="{{ route('customer.destroy', $customers->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger fa fa-eraser btn-s" type="submit">Delete</button>
                </form>
                  </td>
                  </tr>
            </tbody>

      </table>
      </div>                 
            
@stop