<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Book;
use App\Models\Food;
use App\Models\Play;
use App\Models\Rate;
use App\Models\Room;
use App\Models\Seat;
use App\Models\Sell;
use App\Models\Movie;
use App\Models\Cinema;
use App\Models\Casting;
use App\Models\Favorite;
use App\Models\Broadcast;
use App\Policies\BookPolicy;
use App\Policies\FoodPolicy;
use App\Policies\PlayPolicy;
use App\Policies\RatePolicy;
use App\Policies\RoomPolicy;
use App\Policies\SeatPolicy;
use App\Policies\SellPolicy;
use App\Policies\MoviePolicy;
use App\Policies\CinemaPolicy;
use Laravel\Passport\Passport;
use App\Policies\CastingPolicy;
use App\Policies\FavoritePolicy;
use App\Policies\BroadcastPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Book::class => BookPolicy::class,
        Broadcast::class => BroadcastPolicy::class,
        Casting::class => CastingPolicy::class,
        Cinema::class => CinemaPolicy::class,
        Favorite::class => FavoritePolicy::class,
        Food::class => FoodPolicy::class,
        Movie::class => MoviePolicy::class,
        Play::class => PlayPolicy::class,
        Rate::class => RatePolicy::class,
        Room::class => RoomPolicy::class,
        Seat::class => SeatPolicy::class,
        Sell::class => SellPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        #Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');
    }
}
