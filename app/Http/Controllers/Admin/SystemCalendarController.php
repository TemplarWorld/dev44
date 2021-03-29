<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\TimeProject',
            'date_field' => 'created_at',
            'field'      => 'id',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.time-projects.edit',
        ],
        [
            'model'      => '\App\TimeProject',
            'date_field' => 'created_at',
            'field'      => 'created_at',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.time-projects.edit',
        ],
        [
            'model'      => '\App\TimeProject',
            'date_field' => 'created_at',
            'field'      => 'id',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.time-projects.edit',
        ],
        [
            'model'      => '\App\Icra',
            'date_field' => 'start_date',
            'field'      => 'id',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.icras.edit',
        ],
        [
            'model'      => '\App\DrawingRequest',
            'date_field' => 'start_date',
            'field'      => 'id',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.drawing-requests.edit',
        ],
        [
            'model'      => '\App\InformationRequest',
            'date_field' => 'start_date',
            'field'      => 'id',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.information-requests.edit',
        ],
        [
            'model'      => '\App\Commissioning',
            'date_field' => 'start_date',
            'field'      => 'id',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.commissionings.edit',
        ],
    ];

    public function index()
    {
        $events = [];

        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . " " . $model->{$source['field']}
                        . " " . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
