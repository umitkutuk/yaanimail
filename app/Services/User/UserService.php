<?php

namespace App\Services\User;

use App\Repositories\User\UserRepositoryInterface;
use App\Models\User;

class UserService implements UserServiceInterface
{
    /**
     * @var \App\Repositories\User\UserRepositoryInterface
     */
    public $userRepository;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @inheritDoc
     */
    public function createUser(array $data): User
    {
        return $this->userRepository->create($data);
    }

    /**
     * @inheritDoc
     */
    public function getUserById(int $id): User
    {
        return $this->userRepository->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function updateUser(array $data, int $id): User
    {
        $user = $this->userRepository->update($data, $id);

        return $user;
    }

    /**
     * @inheritDoc
     */
    public function destroyUser(int $id): User
    {
        $user = $this->userRepository->destroy($id);

        return $user;
    }

    /**
     * @param int $userId
     * @param string $emailCode
     * @return bool
     */
    public function checkUserEmailVerifyCode(int $userId, string $emailCode): bool
    {
        $checkCode = $this->userRepository->checkUserEmailVerifyCode($userId, $emailCode);

        if (true === $checkCode) {
            auth()->user()->setEmailVerifiedAt();
        }

        return $checkCode;
    }

    /**
     * @param int $userId
     * @param string $phoneCode
     * @return bool
     */
    public function checkUserPhoneVerifyCode(int $userId, string $phoneCode): bool
    {
        $checkCode = $this->userRepository->checkUserPhoneVerifyCode($userId, $phoneCode);

        if (true === $checkCode) {
            auth()->user()->setPhoneVerifiedAt();
        }

        return $checkCode;
    }
}
