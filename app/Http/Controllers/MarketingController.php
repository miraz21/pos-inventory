<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Marketing;

class MarketingController extends Controller
{
    public function index()
  {
    $marketings=Marketing::orderBy('id','desc')->paginate(5);
    return view('marketing.index', compact('marketings'));
  }
    public function create()
    {
        return view('marketing.create');
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

        Marketing::create($data);
        
        return redirect()->route('marketing.index');

        }catch(\Exception $exception){
         return redirect()->back()->withErrors($exception->getMessage());

        }
      
    }
        public function delete($id)
    {
        $marketing=Marketing::find($id);

        $marketing->delete();
        return redirect()->back();
    }
}
