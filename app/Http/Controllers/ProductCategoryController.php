<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
   public function index()
  {
    $productcategories=ProductCategory::orderBy('id','desc')->paginate(5);
    return view('productcategory.index', compact('productcategories'));
  }
    public function create()
    {
        $productcategory=ProductCategory::all();
        return view('productcategory.create');
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

        ProductCategory::create($data);
        
        return redirect()->route('productcategory.index');

        }catch(\Exception $exception){
         return redirect()->back()->withErrors($exception->getMessage());

        }
      
    }
        public function delete($id)
    {
        $productcategory=ProductCategory::find($id);

        $productcategory->delete();
        return redirect()->back();
    }
}
