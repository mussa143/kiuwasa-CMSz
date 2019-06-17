@extends('layouts.blank')

@section('content')
<div class="row">
<div class="pull-right">
<a href="{{ route('ex.create')}}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-600">
                      <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">New Record</span>
                  </a>
                  <a href="/expenditure" class="btn btn-primary btn-icon-split">
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
<h1 class="h3 mb-2 text-gray-800">Expenses</h1>
<p class="mb-4"></a>.</p>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <TH>Action</TH>
          </tr>
        </thead>
        <tfoot>
  @foreach($expenditures as $expenditure)
        <tr>
            <td>{{ $expenditure->id}}</td>
            <td>{{ $expenditure->exname}}</td>
            <td>
            <a href="{{ route('expenditure.edit', $expenditure->id) }}" class='btn btn-warning pull-right btn-sm fa fa-edit btn-circle'></a>
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
{{ $expenditures->links() }}
</div>
	</div><br>
	
</div>            
            
@stop
