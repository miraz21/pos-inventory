@extends('layouts.main')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Add Sale Amount</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('dailysale.create')}}" method="post" enctype="multipart/form-data">
@csrf 
  <div class="mb-3">
    <select class="form-select" name="saleman_id">
    <option value=" ">Select SaleMan</option>
    @foreach($saleman as $item)
    <option value="{{$item->id}}">{{$item->name}}</option>
    @endforeach
    </select>
  </div>
  <div class="mb-3">
    <select class="form-select" name="product_id">
    <option value=" ">Select product</option>
    @foreach($products as $item)
    <option value="{{$item->id}}">{{$item->productname->name}} ({{$item->companyname->title}})</option>
    @endforeach
    </select>
  </div>
   <div class="mb-3">
    <label for="sale_amount" class="form-label">Sale Amount</label>
    <input type="number" name="sale_amount" class="form-control" id="sale_amount">
  </div>
   <div class="mb-3">
    <label for="due_amount" class="form-label">Due Amount</label>
    <input type="number" name="due_amount" class="form-control" id="due_amount">
  </div>
   <div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="number" name="quantity" class="form-control" id="quantity">
  </div>
 
   <div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" name="date" class="form-control" id="date" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
@endsection