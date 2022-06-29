<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Models\Category;

class CategoryController extends Controller
{
  public function index()
  {
    $categories=Category::orderBy('id','desc')->paginate(5);
    return view('category.index', compact('categories'));
  }
    public function create()
    {
        $category=Category::all();
        return view('category.create');
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

        Category::create($data);
        
        return redirect()->route('category.index');

        }catch(\Exception $exception){
         return redirect()->back()->withErrors($exception->getMessage());

        }
      
    }
        public function delete($id)
    {
        $category=Category::find($id);

        $category->delete();
        return redirect()->back();
    }
}
