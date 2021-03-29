<?php

namespace App\Http\Requests;

use App\Contractor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContractorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contractor_create');
    }

    public function rules()
    {
        return [
            'name'                      => [
                'string',
                'required',
            ],
            'contractor_contact'        => [
                'string',
                'required',
            ],
            'contractor_street_address' => [
                'string',
                'required',
            ],
            'contractor_city'           => [
                'string',
                'required',
            ],
            'contractor_state'          => [
                'string',
                'required',
            ],
            'contractor_zip'            => [
                'string',
                'required',
            ],
            'contractor_247_tel'        => [
                'string',
                'required',
            ],
            'contractor_tel'            => [
                'string',
                'nullable',
            ],
            'contractor_tel_2'          => [
                'string',
                'nullable',
            ],
        ];
    }
}
