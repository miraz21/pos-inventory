@extends('layouts.main')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Daily Sale </h2>		
		</div>
		<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('dailysale.create') }}"> <i class="fa fa-plus"></i> Add Sale Amount </a>
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
			      <th scope="col">Sale Amount</th>
			      <th scope="col">Due Amount</th>
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
	           @foreach($dailysales as $key=>$dailysale)
		       <tr>
		      <th scope="row">{{$key+1}}</th>
		      <td>{{$dailysale->saleman->name}}</td>
		      <td>{{$dailysale->product->productname->name}} ({{$dailysale->product->companyname->title}})</td>
		      <td>{{number_format($dailysale->sale_amount)}}</td>
		      <td>{{number_format($dailysale->due_amount)}}</td>
		      <td>{{number_format($dailysale->quantity)}}</td>
		      <td>{{$dailysale->date}}</td> 
		      <td>
		      	<a href="{{route('dailysale.edit', $dailysale->id)}}"class="btn btn-primary">Edit</a>
		      	<a href="{{route('dailysale.delete', $dailysale->id)}}"class="btn btn-warning">Delete</a>
		      </td> 
		    </tr>
            @endforeach
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	  @endsection