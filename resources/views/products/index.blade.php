@extends('layouts.main')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Product </h2>		
		</div>
		<div class="col-md-6 text-right">
	      <a class="btn btn-info" href="{{ route('product.create') }}"> <i class="fa fa-plus"></i> New Product </a>
		</div>
	</div>

	<!-- DataTales Example -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>

	    <div class="card-body">
	      <div class="table-responsive">
	        <table class="table table-borderless table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              <th scope="col">ID</th>
	              <th scope="col">Category</th>
			      <th scope="col">Name</th>
			      <th scope="col">Price</th>
			      <th scope="col">Discount</th>
			      <th scope="col">Quantity</th>
			      <th scope="col">Company</th>
			      <th scope="col">Action</th>
	            </tr>
	          </thead>
	          <tfoot>
	            <tr>
	              <th>ID</th>
	              <th>Title</th>
	              <th class="text-right">Actions</th>
	            </tr>
	          </tfoot>
	          <tbody>
	           @foreach($products as $key=>$product)
		       <tr>
		      <th scope="row">{{$key+1}}</th>
		      <td>{{$product->category->title}}</td>
		      <td>{{$product->productname->name}}</td>
		      <td>{{number_format($product->price)}}</td>
		      <td>{{number_format($product->discount)}}</td>
		      <td>{{number_format($product->quantity)}}</td>
		      <td>{{$product->companyname->title}}</td>  
		      <td>
		      	<a href="{{route('product.edit', $product->id)}}"class="btn btn-primary">Edit</a>
		      	<a href="{{route('product.delete', $product->id)}}"class="btn btn-warning">Delete</a>
		      </td> 
		    </tr>
            @endforeach
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	  @endsection