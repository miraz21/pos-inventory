@extends('layouts.main')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Edit Report</h3>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('dailycost.edit',$dailycost->id)}}" method="post" enctype="multipart/form-data">
@csrf 
 <div class="mb-3">
    <label for="name" class="form-label">Marketing</label>
    <select class="form-select">
      <option value="">{{$dailycost->marketing_name}}</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="transfer" class="form-label">Transfer</label>
    <input type="number" name="transfer" class="form-control" id="transfer" value="{{$dailycost->transfer}}">
  </div>
   <div class="mb-3">
    <label for="oil" class="form-label">Oil Bill</label>
    <input type="number" name="oil" class="form-control" id="oil" value="{{$dailycost->oil}}" >
  </div>
   <div class="mb-3">
    <label for="lunch" class="form-label">Lunch Bill</label>
    <input type="number" name="lunch" class="form-control" id="lunch" value="{{$dailycost->lunch}}" >
  </div>
   <div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" name="date" class="form-control" id="date" value="{{$dailycost->date}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
@endsection