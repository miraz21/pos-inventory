@extends('layouts.main')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Daily Cost </h2>		
		</div>
		<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('dailycost.create') }}"> <i class="fa fa-plus"></i> Add Daily Cost </a>
		</div>
	</div>

	<!-- DataTales Example -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
	    </div>
	    <div class="card-body">
	      <div class="table-responsive">
	        <table class="table table-borderless table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              <th scope="col">ID</th>
	              <th scope="col">Marketing</th>
			      <th scope="col">Transfer Bill</th>
			      <th scope="col">Oil Bill</th>
			      <th scope="col">Lunch Bill</th>
			      <th scope="col">Date</th>
			      <th scope="col">Action</th>
	            </tr>
	          </thead>
	          <tfoot>
	            <tr>
	              <th>ID</th>
	              <th>Name</th>
	              <th class="text-right">Actions</th>
	            </tr>
	          </tfoot>
	          <tbody>
	           @foreach($dailycosts as $key=>$dailycost)
		       <tr>
		      <th scope="row">{{$key+1}}</th>
		      <td>{{$dailycost->marketing->name}}</td>
		      <td>{{number_format($dailycost->transfer)}}</td>
		      <td>{{number_format($dailycost->oil)}}</td>
		      <td>{{number_format($dailycost->lunch)}}</td>
		      <td>{{$dailycost->date}}</td>  
		      <td>
		      	<a href="{{route('dailycost.edit', $dailycost->id)}}"class="btn btn-primary">Edit</a>
		      	<a href="{{route('dailycost.delete', $dailycost->id)}}"class="btn btn-warning">Delete</a>
		      </td> 
		    </tr>
            @endforeach
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	  @endsection