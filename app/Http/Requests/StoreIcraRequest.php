<?php

namespace App\Http\Requests;

use App\Icra;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreIcraRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('icra_create');
    }

    public function rules()
    {
        return [
            'icra_program'             => [
                'string',
                'nullable',
            ],
            'start_date'               => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'end_date'                 => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'icra_ante_pressure'       => [
                'string',
                'nullable',
            ],
            'icra_const_area_pressure' => [
                'string',
                'nullable',
            ],
            'icra_requested_by'        => [
                'string',
                'nullable',
            ],
            'icra_approval_date'       => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
        ];
    }
}
