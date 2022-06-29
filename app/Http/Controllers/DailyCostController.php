<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DailyCost;

use App\Models\Marketing;

class DailyCostController extends Controller
{
       public function index()
    {
        $dailycosts=DailyCost::orderBy('id','desc')->paginate(5);
        return view('dailycost.index', compact('dailycosts'));
    }

    public function create()
    {
        $marketing=Marketing::all();
        return view('dailycost.create', compact('marketing'));
    }

    public function store(Request $request)
    {   
        try{
        $request->validate([
        'marketing_id'=>'required', 
        'transfer'=>'required',
        'oil'=>'required',
        'lunch'=>'required',
        'date'=>'required',
         ]);

         $data=[
        'marketing_id'=>$request->input('marketing_id'),
        'transfer'=>$request->input('transfer'),
        'oil'=>$request->input('oil'),
        'lunch'=>$request->input('lunch'),
        'date'=>$request->input('date'),
        ];

        DailyCost::create($data);
        
        return redirect()->route('dailycost.index');

        }catch(\Exception $exception){
         return redirect()->back()->withErrors($exception->getMessage());

        }
      
    }

    public function edit($id)
    {
        $dailycost=DailyCost::find($id);
        return view('dailycost.edit', compact('dailycost'));
    }
    public function update(Request $request, $id)
    {
        try{
         $request->validate([
        //'marketing_id'=>'required', 
        'transfer'=>'required',
        'oil'=>'required',
        'lunch'=>'required',
        'date'=>'required',
         ]);

        $data=[
        //'marketing_id'=>$request->input('marketing_id'),
        'transfer'=>$request->input('transfer'),
        'oil'=>$request->input('oil'),
        'lunch'=>$request->input('lunch'),
        'date'=>$request->input('date'),
        ];

        $dailycost=DailyCost::find($id);
        $dailycost->update($data);
        return redirect()->route('dailycost.index');

        }catch(\Exception $exception){
        
         return redirect()->back()->withErrors($exception->getMessage());
        
        }
        
    }

    public function delete($id)
    {
        $dailycost=DailyCost::find($id);

        $dailycost->delete();
        return redirect()->back();
    }
}
