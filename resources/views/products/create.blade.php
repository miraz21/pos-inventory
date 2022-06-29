@extends('layouts.main')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Create New Product</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('product.create')}}" method="post" enctype="multipart/form-data">
@csrf 
  <div class="mb-3">
    <select class="form-select" name="category_id">
    <option value=" ">Select Category</option>
    @foreach($category as $item)
    <option value="{{$item->id}}">{{$item->title}}</option>
    @endforeach
    </select>
  </div>
   <div class="mb-3">
    <select class="form-select" name="productname_id">
    <option value=" ">Select Product</option>
    @foreach($productname as $item)
    <option value="{{$item->id}}">{{$item->name}}</option>
    @endforeach
    </select>
  </div>
   <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" name="price" class="form-control" id="price" >
  </div>
   <div class="mb-3">
    <label for="discount" class="form-label">Discount</label>
    <input type="number" name="discount" class="form-control" id="discount" >
  </div>
     <div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="number" name="quantity" class="form-control" id="quantity" >
  </div>
   <div class="mb-3">
    <select class="form-select" name="companyname_id">
    <option value=" ">Select Company</option>
    @foreach($companyname as $item)
    <option value="{{$item->id}}">{{$item->title}}</option>
    @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
@endsection