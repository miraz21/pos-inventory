@extends('layouts.main')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Product Category </h2>		
		</div>
		<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('category.create') }}"> <i class="fa fa-plus"></i> New Category </a>
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
	              <th>Category</th>
	              <th class="text-right">Actions</th>
	            </tr>
	          </thead>
	          <tfoot>
	            <tr>
	              <th>ID</th>
	              <th>Category</th>
	              <th class="text-right">Actions</th>
	            </tr>
	          </tfoot>
	          <tbody>
	          	@foreach($categories as $category)
		            <tr>
		              <td> {{ $category->id }} </td>
		              <td> {{ $category->title }} </td>
		              <td class="text-right">
		             <a class="btn btn-danger" href="{{route('category.delete', $category->id)}}">Delete</a>
		              </td>
		            </tr>
	            @endforeach
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	  @endsection