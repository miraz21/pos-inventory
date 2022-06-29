<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Models\Product;

use App\Models\Category;

use App\Models\ProductName;

use App\Models\CompanyName;

use App\Models\ReturnProduct;

class ProductController extends Controller
{
      public function index()
    {
        $products=Product::orderBy('id','desc')->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $companyname=CompanyName::all();
        $productname=ProductName::all();
        $category=Category::all();
        return view('products.create', compact('category','productname','companyname'));
    }

    public function store(Request $request)
    {   
        try{
        $request->validate([
        'category_id'=>'required', 
        'productname_id'=>'required',
        'price'=>'required',
        'discount'=>'required',
        'quantity'=>'required',
        'companyname_id'=>'required',
         ]);


         $data=[
        'category_id'=>$request->input('category_id'),
        'productname_id'=>$request->input('productname_id'),
        'price'=>$request->input('price'),
        'discount'=>$request->input('discount'),
        'quantity'=>$request->input('quantity'),
        'companyname_id'=>$request->input('companyname_id'),
        ];

        Product::create($data);
        
        return redirect()->route('product.index');

        }catch(\Exception $exception){
         return redirect()->back()->withErrors($exception->getMessage());

        }
      
    }

    public function edit($id)
    {
        $product=Product::find($id);
        return view('products.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {

      
        try{
         $request->validate([
        //'category_id'=>'required', 
        //'productname_id'=>'required',
        'price'=>'required',
        'discount'=>'required',
        'quantity'=>'required',
        //'companyname_id'=>'required',
         ]);


        $data=[
        //'category_id'=>$request->input('category_id'),
        //'productname_id'=>$request->input('productname_id'),
        'price'=>$request->input('price'),
        'discount'=>$request->input('discount'),
        'quantity'=>$request->input('quantity'),
        //'companyname_id'=>$request->input('companyname_id'),
        ];

        $product = Product::find($id);
        $product->update($data);
        return redirect()->route('product.index');

        }catch(\Exception $exception){
        
         return redirect()->back()->withErrors($exception->getMessage());
        
        }
        
    }

    public function delete($id)
    {
        $product=Product::find($id);

        $product->delete();
        return redirect()->back();
    }
}
