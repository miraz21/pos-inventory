<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SaleMan;

use App\Models\DailySale;

use App\Models\Product;

use App\Models\ReturnProduct;

class ReturnProductController extends Controller
{
      public function index()
    {
        $returnproducts= ReturnProduct::with(['product.productname','product.companyname'])->orderBy('id','desc')->paginate(10);

        return view('returnproduct.index', compact('returnproducts'));
    }


    public function create()
    {
        $products=Product::with(['companyname','productname'])->get();
        $saleman=SaleMan::all();
        $returnproduct=ReturnProduct::all();
        return view('returnproduct.create',compact('saleman','products','returnproduct'));
    }

    public function store(Request $request)
    {  

        try{
        $request->validate([
        'saleman_id'=>'required', 
        'product_id'=>'required',
        'quantity'=>'required',
        'date'=>'required',
         ]);

         $data=[
        'saleman_id'=>$request->input('saleman_id'),
        'product_id'=>$request->input('product_id'),
        'quantity'=>$request->input('quantity'),
        'date'=>$request->input('date'),
        ];

        ReturnProduct::create($data);
        Product::where('id',$request->product_id)->increment('quantity',$request->quantity);
        
        return redirect()->route('returnproduct.index');

        }catch(\Exception $exception){
         return redirect()->back()->withErrors($exception->getMessage());

        }
      
    }

    public function delete($id)
    {
        $returnproduct=ReturnProduct::find($id);

        $returnproduct->delete();
        return redirect()->back();
    }
}
