<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'email' => [
                'required',
                Rule::unique(User::class, 'email')
            ],
            'password' => [
                'required',
            ],
            'phone' => [
                'required',
            ],
            'twitter_user_id' => [
                'required',
                Rule::unique(User::class, 'twitter_user_id')
            ]
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributes()
    {
        return User::$labels;
    }
}
