<?php

namespace App\Policies;

use App\ListTodo;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ListTodoPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }
    public function view(User $user, ListTodo $listTodo)
    {
        return $user->id == $listTodo->user()->getResults()->id;
    }
    public function create(User $user)
    {
        return true;
    }
    public function update(User $user, ListTodo $listTodo)
    {
        return $user->id == $listTodo->user()->getResults()->id;
    }
    public function delete(User $user, ListTodo $listTodo)
    {
        return $user->id == $listTodo->user()->getResults()->id;
    }
    public function restore(User $user, ListTodo $listTodo)
    {
        //
    }

    public function forceDelete(User $user, ListTodo $listTodo)
    {
        //
    }
}
