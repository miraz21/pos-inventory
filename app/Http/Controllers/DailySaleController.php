<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SaleMan;

use App\Models\DailySale;

use App\Models\BrandName;

use App\Models\Product;

use App\Models\ProductCategory;

class DailySaleController extends Controller
{
         public function index()
    {
        $dailysales= DailySale::with(['product.productname','product.companyname'])->orderBy('id','desc')->paginate(5);

        return view('dailysale.index', compact('dailysales'));
    }


    public function create()
    {
        $products=Product::with(['companyname','productname'])->get();
        $saleman=SaleMan::all();
        return view('dailysale.create',compact('saleman','products'));
    }

    public function store(Request $request)
    {  

        try{
        $request->validate([
        'saleman_id'=>'required', 
        'product_id'=>'required',
        'sale_amount'=>'required',
        'due_amount'=>'required',
        'quantity'=>'required',
        'date'=>'required',
         ]);

         $data=[
        'saleman_id'=>$request->input('saleman_id'),
        'product_id'=>$request->input('product_id'),
        'sale_amount'=>$request->input('sale_amount'),
        'due_amount'=>$request->input('due_amount'),
        'quantity'=>$request->input('quantity'),
        'date'=>$request->input('date'),
        ];

        DailySale::create($data);
        Product::where('id',$request->product_id)->decrement('quantity',$request->quantity);
        
        return redirect()->route('dailysale.index');

        }catch(\Exception $exception){
         return redirect()->back()->withErrors($exception->getMessage());

        }
      
    }

    public function edit($id)
    {
        $dailysale=DailySale::find($id);
        return view('dailysale.edit', compact('dailysale'));
    }
    public function update(Request $request, $id)
    {
        try{
         $request->validate([
        //'saleman_id'=>'required', 
        //'productcategory_id'=>'required',
        'sale_amount'=>'required',
        'due_amount'=>'required',
        'quantity'=>'required',
        //'brandname_id'=>'required',
        'date'=>'required',
         ]);

        $data=[
        //'saleman_id'=>$request->input('saleman_id'),
        //'productcategory_id'=>$request->input('productcategory_id'),
        'sale_amount'=>$request->input('sale_amount'),
        'due_amount'=>$request->input('due_amount'),
        'quantity'=>$request->input('quantity'),
        //'brandname_id'=>$request->input('brandname_id'),
        'date'=>$request->input('date'),
        ];

        $dailysale=DailySale::find($id);
        $dailysale->update($data);
        return redirect()->route('dailysale.index');

        }catch(\Exception $exception){
        
         return redirect()->back()->withErrors($exception->getMessage());
        
        }
        
    }

    public function delete($id)
    {
        $dailysale=DailySale::find($id);

        $dailysale->delete();
        return redirect()->back();
    }
}
