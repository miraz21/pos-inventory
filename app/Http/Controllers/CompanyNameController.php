<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CompanyName;

class CompanyNameController extends Controller
{
    public function index()
  {
    $companynames=CompanyName::orderBy('id','desc')->paginate(5);
    return view('companyname.index', compact('companynames'));
  }
    public function create()
    {
        $companyname=CompanyName::all();
        return view('companyname.create');
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

        CompanyName::create($data);
        
        return redirect()->route('companyname.index');

        }catch(\Exception $exception){
         return redirect()->back()->withErrors($exception->getMessage());

        }
      
    }
        public function delete($id)
    {
        $companyname=CompanyName::find($id);

        $companyname->delete();
        return redirect()->back();
    }
}
