<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductName;

class ProductNameController extends Controller
{
      public function index()
  {
    $productnames=ProductName::orderBy('id','desc')->paginate(5);
    return view('productname.index', compact('productnames'));
  }
    public function create()
    {
        $productname=ProductName::all();
        return view('productname.create');
    }

    public function store(Request $request)
    {   
        try{
        $request->validate([
        'name'=>'required',
         ]);

         $data=[
        'name'=>$request->input('name'),
        ];

        ProductName::create($data);
        
        return redirect()->route('productname.index');

        }catch(\Exception $exception){
         return redirect()->back()->withErrors($exception->getMessage());

        }
      
    }
        public function delete($id)
    {
        $productname=ProductName::find($id);

        $productname->delete();
        return redirect()->back();
    }
}
