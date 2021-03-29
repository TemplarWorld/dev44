<?php

namespace App\Http\Requests;

use App\IcraApproval;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyIcraApprovalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('icra_approval_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:icra_approvals,id',
        ];
    }
}
