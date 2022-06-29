@extends('layouts.main')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Edit Product</h3>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('product.edit',$product->id)}}" method="post" enctype="multipart/form-data">
@csrf 
 <div class="mb-3">
    <label for="title" class="form-label">Category</label>
    <select class="form-select">
      <option value="">{{$product->category->title}}</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Product</label>
    <select class="form-select">
      <option value="">{{$product->productname->name}}</option>
    </select>
  </div>
   <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" name="price" class="form-control" id="price" value="{{$product->price}}" >
  </div>
   <div class="mb-3">
    <label for="discount" class="form-label">Discount</label>
    <input type="number" name="discount" class="form-control" id="discount" value="{{$product->discount}}" >
  </div>
  <div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="number" name="quantity" class="form-control" id="quantity" value="{{$product->quantity}}">
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Company</label>
    <select class="form-select">
      <option value="">{{$product->companyname->title}}</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
@endsection