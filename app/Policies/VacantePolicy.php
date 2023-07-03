<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacante;
use Illuminate\Auth\Access\Response;

class VacantePolicy
{

    /**
     * Retrieves a list of items available for viewing by the specified user.
     *
     * @param User $user The user for whom the available items are retrieved.
     *
     * @return bool
     */
    public function viewAny(User $user)
    {
        return $user->rol === 2;
    }

    /**
     * Updates the given User and Vacante objects.
     *
     * @param User $user The User object to update.
     * @param Vacante $vacante The Vacante object to update.
     * @return bool Returns true if the update is successful, false otherwise.
     */
    public function update(User $user, Vacante $vacante): bool
    {
        return $user->id === $vacante->user_id;
    }


    /**
     * Create a new record for user.
     *
     * @param User $user The User object to be created.
     * @return bool Returns true if the user's role is equal to
     * 2, otherwise returns false.
     */
    public function create(User $user)
    {
        return $user->rol === 2;
    }
}
