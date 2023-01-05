<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Room;
use App\Models\Sell;
use App\Models\Cinema;
use App\Models\User;
use App\Models\Broadcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCinemaRequest;
use App\Http\Requests\UpdateCinemaRequest;

use function PHPUnit\Framework\callback;

class CinemaController extends Controller
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
     * @param  \App\Http\Requests\StoreCinemaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCinemaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id_user=Auth::id();
        $users=User::all()->where('id', $id_user);
        foreach($users as $user){
            $userConnecte=$user;
        }
        $cinemas=Cinema::all()->where('id', $userConnecte->id_cinema);
        foreach($cinemas as $cine){
            $cinema=$cine;
        }
        $rooms=Room::all()->where('id_cinema', $cinema->id);
        $id_foods=Sell::all()->where('id_cinema', $cinema->id)->pluck('id_food', 'id_food');
        $foods=Food::all()->whereIn('id', $id_foods);
        $sells=Sell::all()->whereIn('id_cinema', $cinema->id);
        return view('cinema.show', compact('cinema', 'rooms'))->with(compact('foods', 'sells'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Http\Response
     */
    public function edit(Cinema $cinema)
    {
        return view('cinema.edit', compact('cinema'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCinemaRequest  $request
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCinemaRequest $request, Cinema $cinema)
    {
        $cinema = Cinema::find($request->id);
        $cinema->fill($request->input());
        $cinema->save();
        return redirect()->action(
            [CinemaController::class, 'home']
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cinema $cinema)
    {
        //
    }
}
