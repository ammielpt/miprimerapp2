<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    //todos los metodos reciben el usuario actualmente autenticados
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //before se ejecuta antes que cualquier otro metodo
    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    public function edit(User $authUser, User $user)
    {
        return $authUser->id === $user->id;
    }
    public function update(User $authUser, User $user)
    {
        return $authUser->id === $user->id;
    }

    public function destroy(User $authUser, User $user)
    {
        return $authUser->id === $user->id;
    }
}
