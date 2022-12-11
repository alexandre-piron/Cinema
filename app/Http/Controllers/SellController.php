<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Sell;
use App\Models\Cinema;
use App\Http\Requests\StoreSellRequest;
use App\Http\Requests\UpdateSellRequest;
use App\Models\Room;

class SellController extends Controller
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
    public function create(Cinema $cinema)
    {
        $vendus=Sell::all()->where('id_cinema', $cinema->id)->pluck('id_food');
        $foods=Food::all()->whereNotIn('id', $vendus);
        return view('sell.create', compact('cinema', 'foods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSellRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSellRequest $request)
    {
        Sell::create($request->all());
        return redirect()->action(
            [CinemaController::class, 'show'], ['cinema' => $request->id_cinema]
        );
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
    public function edit(Sell $sell, Cinema $cinema)
    {
        $vendus=Sell::all()->where('id_cinema', $cinema->id)->pluck('id_food');
        $foods=Food::all()->whereNotIn('id', $vendus);
        return view('sell.edit', compact('cinema', 'foods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSellRequest  $request
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSellRequest $request, Sell $sell)
    {
        $sell = Sell::find($request->id);
        $sell->fill($request->input());
        $sell->save();
        return redirect()->action(
            [CinemaController::class, 'show'], ['cinema' => $sell->id_cinema]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sell $sell)
    {
        Sell::destroy($sell->id);
        return redirect()->action(
            [CinemaController::class, 'show'], ['cinema' => $sell->id_cinema]
        );
    }
}
