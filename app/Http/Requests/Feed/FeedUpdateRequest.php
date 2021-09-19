<?php

namespace App\Http\Requests\Feed;

use App\Models\Feed;
use App\Rules\IsOwner;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FeedUpdateRequest extends FormRequest
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
            'feed' => [
                'required',
            ],
            'is_published' => [
                'required',
                'boolean'
            ],
            new IsOwner
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributes()
    {
        return Feed::$labels;
    }
}
