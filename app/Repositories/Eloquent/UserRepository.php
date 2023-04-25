<?php

namespace App\Repositories\Eloquent;

use App\Models\User;

class UserRepository
{
    public function create(array $data)
    {
        return User::create($data);
    }

    public function update(User $user, array $data)
    {
        $user->update($data);
        return $user;
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function login(array $data)
    {
        return User::where($data)->first();
    }
}