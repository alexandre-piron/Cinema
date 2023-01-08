<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Food;
use App\Models\Room;
use App\Models\Seat;
use App\Models\Sell;
use App\Models\User;
use App\Models\Movie;
use App\Models\Cinema;
use App\Models\Broadcast;
use App\Mail\HappyBirthday;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use function PHPUnit\Framework\callback;
use App\Http\Requests\StoreCinemaRequest;
use App\Http\Requests\UpdateCinemaRequest;

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

    public static function email_anniv(){
        $users=User::all()
        ->filter(function ($user ) {
            return date('m-d', strtotime($user->birthday)) === Carbon::now()->format('m-d');
        })
        ->where('id_cinema',null);
        foreach($users as $user){
            Mail::to($user->email)->send(new HappyBirthday($user->firstname));
        }  
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
        $id_rooms=$rooms->pluck('id');
        $id_foods=Sell::all()->where('id_cinema', $cinema->id)->pluck('id_food');
        $foods=Food::all()->whereIn('id', $id_foods);
        $sells=Sell::all()->whereIn('id_cinema', $cinema->id);
        $broadcasts=Broadcast::all()->whereIn('id_room', $id_rooms);
        $id_broadcasts = $broadcasts->pluck('id');
        $id_movies = $broadcasts->pluck('id_movie');
        $books=Book::all()->whereIn('id_broadcast', $id_broadcasts);
        $movies=Movie::all()->whereIn('id', $id_movies);
        return view('cinema.show', compact('cinema', 'rooms', 'movies'))->with(compact('foods', 'sells'))->with(compact('books', 'broadcasts'));
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
