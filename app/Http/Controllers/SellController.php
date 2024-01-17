<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sell')
            ->with('list_sells','list_sells')
            ->with('sellers',Seller::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $count_id = count($request->amount);

        for ($i=0;$i<$count_id;$i++){
            $amount = round(str_replace('.','',$request->amount[$i]));
            if ($amount<200000){
                $percent = 20;
            }else if ($amount>=200000 && $amount<1000000){
                $percent = 22;
            }else{
                $percent = 23;
            }
            $sell = new Sell();
            $sell->amount =  $amount;
            $sell->percent = $percent;
            $sell->seller_id = $request->seller_id[$i];
            $sell->draw = $request->draw;
            $sell->save();
        }

        return redirect()->route('dashboard')->with('successful');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function show(Sell $sell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function edit(Sell $sell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sell $sell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sell $sell)
    {
        //
    }
}
