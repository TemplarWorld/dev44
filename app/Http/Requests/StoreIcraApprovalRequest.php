<?php

namespace App\Http\Requests;

use App\IcraApproval;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreIcraApprovalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('icra_approval_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
