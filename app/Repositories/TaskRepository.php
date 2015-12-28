<?php
/**
 * Created by PhpStorm.
 * User: Vuong
 * Date: 28-Dec-15
 * Time: 9:46 PM
 */

namespace App\Repositories;


use App\Tasks;
use App\User;

class TaskRepository
{
    public function forUser(User $user)
    {
        return Tasks::where('user_id', $user->id)->get();
    }

    public function find($id)
    {
        return Tasks::find($id);
    }

}