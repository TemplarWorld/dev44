<?php

namespace App\Http\Requests;

use App\Approval;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreApprovalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('approval_create');
    }

    public function rules()
    {
        return [
            'permit_approval_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
