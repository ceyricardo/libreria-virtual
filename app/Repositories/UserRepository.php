<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface
{
    public function getAllUsers()
    {
        return User::all();
    }
    public function getUserById($userId)
    {
        return User::findOrFail($userId);
    }
    public function deleteUser($userId)
    {
        User::destroy($userId);
    }
    public function createUser(array $userDetails)
    {
        return User::create($userDetails);
    }
    public function updateUser($userId, array $newDetails)
    {
        return User::whereId($userId)->update($newDetails);
    }
}
