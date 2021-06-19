<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
    public function edit()
    {
        //
        $open_price = Config::where('name', '=', 'open_price')->first()->value;
        $minimum_commission = Config::where('name', '=', 'minimum_commission')->first()->value;
        $subscription_price = Config::where('name', '=', 'subscription_price')->first()->value;
        return view(
            'backend/admin/conf',
            [
                'open_price' => $open_price,
                'minimum_commission' => $minimum_commission,
                'subscription_price' => $subscription_price
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $open_price = Config::where('name', '=', 'open_price')->first();
        $open_price->value = $request->open_price;
        $open_price->save();
        $minimum_commission = Config::where('name', '=', 'minimum_commission')->first();
        $minimum_commission->value = $request->minimum_commission;
        $minimum_commission->save();
        $subscription_price = Config::where('name', '=', 'subscription_price')->first();
        $subscription_price->value = $request->subscription_price;
        $subscription_price->save();

        /*return view(
            'backend/admin/conf',
            [
                'open_price' => $open_price->value,
                'minimum_commission' => $minimum_commission->value,
                'subscription_price' => $subscription_price->value
            ]
        );
        */
        return back()->with('success', 'Configuración modificada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
