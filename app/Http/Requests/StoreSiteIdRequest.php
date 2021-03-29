<?php

namespace App\Http\Requests;

use App\SiteId;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSiteIdRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('site_id_create');
    }

    public function rules()
    {
        return [
            'site_name'      => [
                'string',
                'nullable',
            ],
            'site_address_1' => [
                'string',
                'nullable',
            ],
            'site_address_2' => [
                'string',
                'nullable',
            ],
            'site_city'      => [
                'string',
                'nullable',
            ],
            'site_state'     => [
                'string',
                'nullable',
            ],
            'site_country'   => [
                'string',
                'nullable',
            ],
            'site_telephone' => [
                'string',
                'nullable',
            ],
            'site_email'     => [
                'string',
                'nullable',
            ],
        ];
    }
}
