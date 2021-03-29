<?php

namespace App\Http\Requests;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'name'            => [
                'string',
                'required',
            ],
            'roles.*'         => [
                'integer',
            ],
            'roles'           => [
                'required',
                'array',
            ],
            'email'           => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'telephone'       => [
                'string',
                'nullable',
            ],
            'street_address'  => [
                'string',
                'nullable',
            ],
            'city'            => [
                'string',
                'nullable',
            ],
            'state_province'  => [
                'string',
                'nullable',
            ],
            'country'         => [
                'string',
                'nullable',
            ],
            'zip_postal_code' => [
                'string',
                'nullable',
            ],
        ];
    }
}
