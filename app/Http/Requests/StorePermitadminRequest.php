<?php

namespace App\Http\Requests;

use App\Permitadmin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePermitadminRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('permitadmin_create');
    }

    public function rules()
    {
        return [
            'workorder_1'              => [
                'string',
                'nullable',
            ],
            'workorder_2'              => [
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
            'start_date_iso_1'         => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'end_date_iso_1'           => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'start_time_iso_1'         => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'end_time_iso_1'           => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'system_iso_1_description' => [
                'string',
                'required',
            ],
            'related_permit'           => [
                'string',
                'nullable',
            ],
            'type_of_abatement'        => [
                'string',
                'nullable',
            ],
            'permit_approval_date'     => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
