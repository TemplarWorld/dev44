<?php

namespace App\Http\Requests;

use App\InformationRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInformationRequestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('information_request_edit');
    }

    public function rules()
    {
        return [
            'requested_by'  => [
                'string',
                'required',
            ],
            'info_tel'      => [
                'string',
                'nullable',
            ],
            'req_email'     => [
                'required',
            ],
            'project_name'  => [
                'string',
                'required',
            ],
            'info_date_req' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'info_descrip'  => [
                'required',
            ],
        ];
    }
}
