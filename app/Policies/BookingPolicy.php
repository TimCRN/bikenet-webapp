<?php

namespace App\Policies;

use App\Booking;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return ($user->role >= 1);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Booking  $booking
     * @return mixed
     */
    public function view(User $user, Booking $booking)
    {
        return ($user->role >= 1 or $booking->user_id === $user->id);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->role >= 0);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Booking  $booking
     * @return mixed
     */
    public function update(User $user, Booking $booking)
    {
        return ($user->role >= 1);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Booking  $booking
     * @return mixed
     */
    public function delete(User $user, Booking $booking)
    {
        return ($user->role >= 1 and $booking->completed);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Booking  $booking
     * @return mixed
     */
    public function restore(User $user, Booking $booking)
    {
        return ($user->role >= 1);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Booking  $booking
     * @return mixed
     */
    public function forceDelete(User $user, Booking $booking)
    {
        return ($user->role >= 1);
    }
}
