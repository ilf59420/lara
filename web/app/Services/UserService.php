<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Hash;


class UserService
{
    public function register($data)
    {
        $data['password'] = bcrypt($data['password']);
        User::create($data);
    }
}