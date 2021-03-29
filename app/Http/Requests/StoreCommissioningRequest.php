<?php

namespace App\Http\Requests;

use App\Commissioning;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCommissioningRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('commissioning_create');
    }

    public function rules()
    {
        return [
            'project_manager_id' => [
                'required',
                'integer',
            ],
            'comm_system_1'      => [
                'string',
                'nullable',
            ],
            'comm_location_1'    => [
                'string',
                'nullable',
            ],
            'comm_description_1' => [
                'string',
                'nullable',
            ],
            'comm_datestart_1'   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'comm_enddate_1'     => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'comm_starttime_1'   => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'comm_endtime'       => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
