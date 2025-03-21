<?php

namespace App\Services;

use App\Models\Admin;
use App\Repositories\AdminRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminService
{
    protected AdminRepository $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function store(array $data) : Admin
    {
        return $this->adminRepository->create(
            name: $data['name'],
            lastName: $data['lastName'],
            email: $data['email'],
            password: bcrypt($data['password'])
        );
    }

    public function login(array $credentials): ?array
    {
        $admin = $this->adminRepository->findByEmail($credentials['email']);

        if (!$admin || !Hash::check($credentials['password'], $admin->password)) {
            return null;
        }

        $token = $admin->createToken('auth_token')->plainTextToken;

        return ['admin' => $admin, 'token' => $token];
    }

    public function updatePassword(string $password, string $new_password) : bool
    {
        $admin = Auth::user();

        if (!Hash::check($password, $admin->password)) {
            throw new \Exception("The current password is incorrect");
        }

        $this->adminRepository->updatePassword($admin->getAuthIdentifier(), Hash::make($new_password));
        return true;
    }

}
