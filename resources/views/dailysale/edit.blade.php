@extends('layouts.main')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Edit Sale Report</h3>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('dailysale.edit',$dailysale->id)}}" method="post" enctype="multipart/form-data">
@csrf 
 <div class="mb-3">
    <label for="title" class="form-label">Sale Man</label>
    <select class="form-select">
      <option value="">{{$dailysale->saleman->name}}</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Product Name</label>
    <select class="form-select">
      <option value="">{{$dailysale->productcategory->name}}</option>
    </select>
  </div>
   <div class="mb-3">
    <label for="sale_amount" class="form-label">Sale Amount</label>
    <input type="number" name="sale_amount" class="form-control" id="sale_amount" value="{{$dailysale->sale_amount}}">
  </div>
   <div class="mb-3">
    <label for="due_amount" class="form-label">Due Amount</label>
    <input type="number" name="due_amount" class="form-control" id="due_amount" value="{{$dailysale->due_amount}}">
  </div>
   <div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="number" name="quantity" class="form-control" id="quantity" value="{{$dailysale->quantity}}">
  </div>
   <div class="mb-3">
    <label for="title" class="form-label">Company</label>
    <select class="form-select">
      <option value="">{{$dailysale->brandname->title}}</option>
    </select>
  </div>
   <div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" name="date" class="form-control" id="date" value="{{$dailysale->date}}" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
@endsection