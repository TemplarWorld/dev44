<?php

namespace App\Http\Requests;

use App\IdTag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreIdTagRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('id_tag_create');
    }

    public function rules()
    {
        return [
            'name'                  => [
                'string',
                'required',
            ],
            'email'                 => [
                'required',
                'unique:id_tags',
            ],
            'ic_tel'                => [
                'string',
                'required',
            ],
            'contractor_company_id' => [
                'required',
                'integer',
            ],
            'idtag_em_contact'      => [
                'string',
                'required',
            ],
            'idtag_em_contact_tel'  => [
                'string',
                'required',
            ],
            'idtag_address'         => [
                'string',
                'nullable',
            ],
            'idtag_city'            => [
                'string',
                'nullable',
            ],
            'idtag_state'           => [
                'string',
                'nullable',
            ],
            'idtag_zip'             => [
                'string',
                'nullable',
            ],
        ];
    }
}
