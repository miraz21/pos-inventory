@extends('layouts.main')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Product Name </h2>		
		</div>
		<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('productcategory.create') }}"> <i class="fa fa-plus"></i> New Product Category </a>
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
	              <th>ID</th>
	              <th>Product</th>
	              <th class="text-right">Actions</th>
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
	          	@foreach($productcategories as $productcategory)
		            <tr>
		              <td> {{ $productcategory->id }} </td>
		              <td> {{ $productcategory->name }} </td>
		              <td class="text-right">
		             <a class="btn btn-danger" href="{{route('productcategory.delete', $productcategory->id)}}">Delete</a>
		              </td>
		            </tr>
	            @endforeach
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	  @endsection