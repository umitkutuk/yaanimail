<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Http\Request;

interface AuthServiceInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\User
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request): User;

    /**
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Translation\Translator|string|null
     * @throws \Illuminate\Validation\ValidationException
     */
    public function logout();
}
