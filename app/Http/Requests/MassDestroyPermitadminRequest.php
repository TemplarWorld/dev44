<?php

namespace App\Http\Requests;

use App\Permitadmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPermitadminRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('permitadmin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:permitadmins,id',
        ];
    }
}
