<?php

namespace App\Http\Requests;

use App\IdTag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyIdTagRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('id_tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:id_tags,id',
        ];
    }
}
