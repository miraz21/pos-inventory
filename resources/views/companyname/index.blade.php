@extends('layouts.main')
@section('content')
	<div class="row clearfix page_header">
		<div class="col-md-6">
			<h2> Company Name </h2>		
		</div>
		<div class="col-md-6 text-right">
			<a class="btn btn-info" href="{{ route('companyname.create') }}"> <i class="fa fa-plus"></i> New Compony </a>
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
	              <th>Company</th>
	              <th class="text-right">Actions</th>
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
	          	@foreach($companynames as $companyname)
		            <tr>
		              <td> {{ $companyname->id }} </td>
		              <td> {{ $companyname->title }} </td>
		              <td class="text-right">
		             <a class="btn btn-danger" href="{{route('companyname.delete', $companyname->id)}}">Delete</a>
		              </td>
		            </tr>
	            @endforeach
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	  @endsection