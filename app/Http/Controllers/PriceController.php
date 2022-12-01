<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\ItemPrice;
use App\Models\Item;
use Carbon\Carbon;

Use DB;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all['datas']=ItemPrice::with('item')->with('unit')->get();
        return view('productlist',$all);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all['items']=Item::get();
        $all['units']=Unit::get();
        return view('productadd',$all);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required',
            'price' => 'required',
        ]);

        //dd($request->all());
        $datacheck= ItemPrice::where('item_id', $request->item_id)->where('unit_id', $request->unit_id)->where('price', $request->price)->first();
        if($datacheck){
	      return redirect()->route('pricelist')->with('danger','Already Exits Data');

        }else{
            $data = new ItemPrice;
            $data->item_id = $request->item_id;
            $data->unit_id = $request->unit_id;
            $data->price = $request->price;
            $data->save();
    
            return redirect()->route('pricelist')->with('success','Data Sucessfully Added');


        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data']= ItemPrice::where('id', $id)->first();
        $data['items']=Item::get();
        $data['units']=Unit::get();
    
        return view('productedit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'item_id' => 'required',
            'price' => 'required',
        ]);
        $datacheck= ItemPrice::where('item_id', $request->item_id)->where('id','!=',$id)->where('unit_id', $request->unit_id)->where('price', $request->price)->first();
        if($datacheck){
	      return redirect()->route('pricelist')->with('danger','Data Alreday Exits');

        }else{
            $data =ItemPrice::where('id',$id)->first();;
            $data->item_id = $request->item_id;
            $data->unit_id = $request->unit_id;
            $data->price = $request->price;
            $data->save();
           
    
            return redirect()->route('pricelist')->with('success','Data Sucessfully Updated');


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ItemPrice::findOrFail($id);
        $data->delete();
       

        return redirect()->route('pricelist')->with('success','Data Sucessfully Deleted');
    }
}
