<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Search with pagination</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
       <div class="row">
          <div class="col-md-6" style="margin-top:40px">
             <h4>Search Everything</h4><hr>
             <form action="{{ route('web.find') }}" method="GET">
        
                <div class="form-group">
                   <label for="">Enter keyword</label>
                   <input type="text" class="form-control" name="query" placeholder="Search here....." value="{{ request()->input('query') }}">
                   <span class="text-danger">@error('query'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                 <button type="submit" class="btn btn-primary">Search</button>
                </div>
             </form>
             <br>
             <br>
             <hr>
             <br>
             @if(isset($products))

               <table class="table table-hover">
                   <thead>
                       <tr>
                           <th>Category</th>
                           <th>Product Name</th>
                           <th>Product Company</th>
                           <th>Price</th>
                           <th>Quantity</th>
                       </tr>
                   </thead>
                   <tbody>
                       @if(count($products) > 0)
                           @foreach($products as $product)
                              <tr>
                                  <td>{{ $product->category->title }}</td>
                                  <td>{{ $product->productname->name }}</td>
                                  <td>{{ $product->companyname->title }}</td>
                                   <td>{{ $product->price }}</td>
                                  <td>{{ $product->quantity }}</td>
                              </tr>
                           @endforeach
                       @else

                          <tr><td>No result found!</td></tr>
                       @endif
                   </tbody>
               </table>

               <div class="pagination-block">
                   <?php //{{ $products->links('layouts.paginationlinks') }} ?>
                   {{  $products->appends(request()->input())->links('layouts.paginationlinks') }}
               </div>

             @endif
          </div>
       </div>
    </div>
</body>
</html>