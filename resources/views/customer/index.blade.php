@extends('layouts.blank')

@section('content')
<div class="row">
<div class="pull-right">
<a href="{{ route('customer.create')}}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-600">
                      <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">New Record</span>
                  </a>
                  <a href="/customer" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-600">
                      <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">back</span>
                  </a>
</div>  
<div class="row">
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
</div>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Our Customers</h1>
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="/search">
            <div class="input-group">
              <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for users by zones" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
<p class="mb-4"></a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Customers</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>S/N</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Account #</th>
            <th>Address</th>
            <th>Zone</th>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
  @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->id}}</td>
            <td>{{ $customer->cname}}</td>
            <td>{{ $customer->phone}}</td>
            <td>{{ $customer->acc}}</td>
            <td>{{ $customer->adress}}</td>
            <td>{{ $customer->zone}}</td>
            <td>
            <a href="{{ route('customer.show', $customer->id) }}" class='btn btn-primary pull-right fa fa-eye btn-sm'> View</a>
            <a href="{{ route('customer.edit', $customer->id) }}" class='btn btn-warning pull-right fa fa-edit btn-sm'> edit</a>
			<td>
            <form action="{{ route('customer.destroy', $customer->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger fa fa-cross btn-sm" type="submit">Delete</button>
                </form></td>
            </td>
        </tr>
    @endforeach
        </tbody>

      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
{{ $customers->links() }}
</div>
	</div><br>
	
</div>            
            
@stop
