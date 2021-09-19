<?php

namespace App\Http\Controllers;

use App\Events\User\UserCreated;
use App\Events\User\UserDeleted;
use App\Events\User\UserUpdated;
use App\Http\Requests\User\UserEmailVerifyRequest;
use App\Http\Requests\User\UserPhoneVerifyRequest;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use App\Queries\User\UsersQuery;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * @var \App\Services\User\UserServiceInterface
     */
    public $userService;

    /**
     * FeedController constructor.
     * @param \App\Services\User\UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\User\UserCollection
     */
    public function index(): UserCollection
    {
        $users = (new UsersQuery())->paginate();

        return new UserCollection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserStoreRequest $request
     * @return UserResource
     */
    public function store(UserStoreRequest $request): UserResource
    {
        $data = $request->validated();

        $user = $this->userService->createUser($data);

        event(new UserCreated($user));

        return new UserResource($user);
    }

    /**
     * @param int $id
     * @return \App\Http\Resources\User\UserResource
     */
    public function show($id): UserResource
    {
        $user = $this->userService->getUserById($id);

        return new UserResource($user);
    }

    /**
     * @param \App\Http\Requests\User\UserUpdateRequest $request
     * @param int $id
     * @return \App\Http\Resources\User\UserResource
     */
    public function update(UserUpdateRequest $request, $id): UserResource
    {
        $user = $this->userService->updateUser($request->validated(), $id);

        event(new UserUpdated($user));

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \App\Http\Resources\User\UserResource
     * @throws \Exception
     */
    public function destroy($id): UserResource
    {
        $user = $this->userService->destroyUser($id);

        event(new UserDeleted($user));

        return new UserResource($user);
    }

    /**
     * @param UserEmailVerifyRequest $request
     * @return JsonResponse
     */
    public function verifyEmail(UserEmailVerifyRequest $request): JsonResponse
    {
        $checkEmailCode = $this->userService->checkUserEmailVerifyCode(auth()->user()->id, $request->get('code'));

        return response()->json([
            'is_success' => $checkEmailCode
        ]);
    }

    /**
     * @param UserPhoneVerifyRequest $request
     * @return JsonResponse
     */
    public function verifyPhone(UserPhoneVerifyRequest $request): JsonResponse
    {
        $checkPhoneCode = $this->userService->checkUserPhoneVerifyCode(auth()->user()->id, $request->get('code'));

        return response()->json([
            'is_success' => $checkPhoneCode
        ]);
    }
}
