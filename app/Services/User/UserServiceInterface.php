<?php

namespace App\Services\User;

use App\Models\User;

interface UserServiceInterface
{
    /**
     * @param array $data
     * @return \App\Models\User
     */
    public function createUser(array $data): User;

    /**
     * @param int $id
     * @return \App\Models\User
     */
    public function getUserById(int $id): User;

    /**
     * @param array $data
     * @param int $id
     * @return \App\Models\User
     */
    public function updateUser(array $data, int $id): User;

    /**
     * @param int $id
     * @return \App\Models\User
     * @throws \Exception
     */
    public function destroyUser(int $id): User;

    /**
     * @param int $userId
     * @param string $emailCode
     * @return bool
     */
    public function checkUserEmailVerifyCode(int $userId, string $emailCode): bool;

    /**
     * @param int $userId
     * @param string $phoneCode
     * @return bool
     */
    public function checkUserPhoneVerifyCode(int $userId, string $phoneCode): bool;
}
