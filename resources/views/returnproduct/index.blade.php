@extends('layouts.main')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Return Product </h2>		
		</div>
		<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('returnproduct.create') }}"> <i class="fa fa-plus"></i> Add Return Product </a>
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
	              <th scope="col">Sale Man</th>
	              <th scope="col">Product</th>
			      <th scope="col">Quantity</th>
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
	           @foreach($returnproducts as $key=>$returnproduct)
		       <tr>
		      <th scope="row">{{$key+1}}</th>
		      <td>{{$returnproduct->saleman->name}}</td>
		      <td>{{$returnproduct->product->productname->name}} ({{$returnproduct->product->companyname->title}})
		      </td>
		      <td>{{number_format($returnproduct->quantity)}}</td>
		      <td>{{$returnproduct->date}}</td> 
		      <td>
		      	<a href="{{route('returnproduct.delete', $returnproduct->id)}}"class="btn btn-warning">Delete</a>
		      </td> 
		    </tr>
            @endforeach
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	  @endsection