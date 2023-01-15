<?php

namespace App\Policies;

use App\Models\Cinema;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CinemaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Cinema $cinema)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Cinema $cinema)
    {
        return true;
        /*
        if($user->cinema() && $user->isAdmin()){
            return true;
        }
        else{
            return false;
        }*/
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Cinema $cinema)
    {
        if($user->cinema() && $user->isAdmin()){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Cinema $cinema)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cinema  $cinema
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Cinema $cinema)
    {
        return false;
    }
}
