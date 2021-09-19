<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Role;
use App\Rules\PhoneOrEmail;
use App\Services\Auth\AuthServiceInterface;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * @var \App\Services\Auth\AuthServiceInterface
     */
    public $authService;

    /**
     * LoginController constructor.
     *
     * @param \App\Services\Auth\AuthServiceInterface $authService
     */
    public function __construct(AuthServiceInterface $authService)
    {
        $this->middleware('guest')->except('logout');

        $this->authService = $authService;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => [
                'required',
                'string',
            ],
            'password' => [
                'required',
            ],
        ]);

        $user = $this->authService->login($request);

        $user->tokens()->delete();

        return response()->json([
            'access_token' => $user->createToken('Personal Access Token')->accessToken
        ]);
    }

    public function showLoginForm()
    {
        return response()->json([
            'message' => __('You need to login properly')
        ],400);
    }

    public function logout()
    {
        $message = $this->authService->logout();

        return response()->json([
            'message' => $message
        ]);
    }
}
