<?php

namespace App\Repositories;

use App\Models\Admin;

class AdminRepository
{
    public function create(string $name, string $lastName, string $email, string $password) : Admin
    {
        return Admin::create([
            'name' => $name,
            'lastName' => $lastName,
            'email' => $email,
            'password' => $password,
        ]);
    }

    public function findByEmail(string $email) : ?Admin
    {
        return Admin::where('email', $email)->first();
    }

    public function updatePassword(int $admin_id, string $new_password) : int
    {
        return Admin::whereId($admin_id)->update(["password" => $new_password]);
    }

}
