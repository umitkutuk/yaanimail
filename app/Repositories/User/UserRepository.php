<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var \App\Models\User|\Illuminate\Database\Eloquent\Builder
     */
    protected $builder;

    /**
     * @var \App\Models\User
     */
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function getModel(): User
    {
        return $this->model;
    }

    /**
     * @inheritDoc
     */
    public function getBuilder()
    {
        return $this->builder = $this->getModel()::query();
    }

    /**
     * @inheritDoc
     */
    public function setBuilder(Builder $builder)
    {
        $this->builder = $builder;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function all($columns = ['*'])
    {
        return $this->getBuilder()->get($columns);
    }

    /**
     * @inheritDoc
     */
    public function findOrFail(int $id): User
    {
        return $this->getBuilder()->findOrfail($id);
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes): User
    {
        return $this->getBuilder()->create($attributes);
    }

    /**
     * @inheritDoc
     */
    public function update(array $attributes, int $id, array $options = []): User
    {
        $model = $this->findOrFail($id);

        $model->update($attributes, $options);

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function destroy(int $id): User
    {
        $model = $this->findOrFail($id);

        $model->delete();

        return $model;
    }

    /**
     * @param string $userName
     * @return \App\Models\User
     */
    public function findByUserName(string $userName): User
    {
        return $this->getBuilder()
            ->where('email', $userName)
            ->firstOrFail();
    }

    /**
     * @param int $userId
     * @param string $emailCode
     * @return bool
     */
    public function checkUserEmailVerifyCode(int $userId, string $emailCode): bool
    {
        return $this->getBuilder()
            ->where('id', $userId)
            ->where('email_verification_code', $emailCode)
            ->exists();
    }

    /**
     * @param int $userId
     * @param string $phoneCode
     * @return bool
     */
    public function checkUserPhoneVerifyCode(int $userId, string $phoneCode): bool
    {
        return $this->getBuilder()
            ->where('id', $userId)
            ->where('phone_verification_code', $phoneCode)
            ->exists();
    }
}
