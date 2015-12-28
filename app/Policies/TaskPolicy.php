<?php

namespace App\Policies;

use App\Http\Requests\Request;
use App\Tasks;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function destroy(User $user, Tasks $tasks)
    {
        return $user->id === $tasks->user_id;
    }
}
