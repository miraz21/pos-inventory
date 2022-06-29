<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BrandName;

class BrandNameController extends Controller
{
 public function index()
  {
    $brandnames=BrandName::orderBy('id','desc')->paginate(5);
    return view('brandname.index', compact('brandnames'));
  }
    public function create()
    {
        $brandname=BrandName::all();
        return view('brandname.create');
    }

    public function store(Request $request)
    {   
        try{
        $request->validate([
        'title'=>'required',
         ]);

         $data=[
        'title'=>$request->input('title'),
        ];

        Brandname::create($data);
        
        return redirect()->route('brandname.index');

        }catch(\Exception $exception){
         return redirect()->back()->withErrors($exception->getMessage());

        }
      
    }
        public function delete($id)
    {
        $brandname=Brandname::find($id);

        $brandname->delete();
        return redirect()->back();
    }
}
