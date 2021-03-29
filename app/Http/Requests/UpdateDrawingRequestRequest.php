<?php

namespace App\Http\Requests;

use App\DrawingRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDrawingRequestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('drawing_request_edit');
    }

    public function rules()
    {
        return [
            'tracking_number'       => [
                'string',
                'nullable',
            ],
            'dr_requested_by'       => [
                'string',
                'required',
            ],
            'date_required'         => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'project_description'   => [
                'required',
            ],
            'project_building_id'   => [
                'required',
                'integer',
            ],
            'dr_1_type_description' => [
                'string',
                'nullable',
            ],
            'project_building_2'    => [
                'string',
                'nullable',
            ],
            'project_area_2'        => [
                'string',
                'nullable',
            ],
            'dr_2_type_description' => [
                'string',
                'nullable',
            ],
            'project_building_3'    => [
                'string',
                'nullable',
            ],
            'project_area_3'        => [
                'string',
                'nullable',
            ],
            'dr_3_type'             => [
                'string',
                'nullable',
            ],
            'civil_other'           => [
                'string',
                'nullable',
            ],
            'civil_descrip'         => [
                'string',
                'nullable',
            ],
        ];
    }
}
