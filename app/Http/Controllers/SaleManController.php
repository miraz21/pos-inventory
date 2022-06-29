<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SaleMan;

class SaleManController extends Controller
{
   public function index()
  {
    $salemans=SaleMan::orderBy('id','desc')->paginate(5);
    return view('saleman.index', compact('salemans'));
  }
    public function create()
    {
        return view('saleman.create');
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

        SaleMan::create($data);
        
        return redirect()->route('saleman.index');

        }catch(\Exception $exception){
         return redirect()->back()->withErrors($exception->getMessage());

        }
      
    }
        public function delete($id)
    {
        $saleman=SaleMan::find($id);

        $saleman->delete();
        return redirect()->back();
    }
}
