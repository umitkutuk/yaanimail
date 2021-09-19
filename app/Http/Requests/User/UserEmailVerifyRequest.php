<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserEmailVerifyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => [
                'required',
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributes()
    {
        return [
            'code' => 'Email Doğrulama Kodu'
        ];
    }
}
