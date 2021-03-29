<?php

namespace App\Http\Requests;

use App\TimeProject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTimeProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('time_project_edit');
    }

    public function rules()
    {
        return [
            'name'                => [
                'string',
                'min:2',
                'required',
            ],
            'account_number'      => [
                'string',
                'min:2',
                'nullable',
            ],
            'project_number'      => [
                'string',
                'min:2',
                'nullable',
            ],
            'project_group'       => [
                'required',
            ],
            'sub_contractors.*'   => [
                'integer',
            ],
            'sub_contractors'     => [
                'array',
            ],
            'site'                => [
                'string',
                'nullable',
            ],
            'project_building'    => [
                'string',
                'nullable',
            ],
            'project_area'        => [
                'string',
                'nullable',
            ],
            'project_description' => [
                'required',
            ],
            'start_date'          => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'end_date'            => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
        ];
    }
}
