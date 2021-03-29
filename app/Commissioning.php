<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Commissioning extends Model
{
    use SoftDeletes;

    public $table = 'commissionings';

    protected $dates = [
        'comm_datestart_1',
        'comm_enddate_1',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'comm_1_worko',
        'project_name_id',
        'project_manager_id',
        'project_coordinator_id',
        'project_number_id',
        'comm_system_1',
        'comm_location_1',
        'comm_description_1',
        'comm_datestart_1',
        'comm_enddate_1',
        'comm_starttime_1',
        'comm_endtime',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function project_name()
    {
        return $this->belongsTo(TimeProject::class, 'project_name_id');
    }

    public function project_manager()
    {
        return $this->belongsTo(User::class, 'project_manager_id');
    }

    public function project_coordinator()
    {
        return $this->belongsTo(User::class, 'project_coordinator_id');
    }

    public function project_number()
    {
        return $this->belongsTo(TimeProject::class, 'project_number_id');
    }

    public function getCommDatestart1Attribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCommDatestart1Attribute($value)
    {
        $this->attributes['comm_datestart_1'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCommEnddate1Attribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCommEnddate1Attribute($value)
    {
        $this->attributes['comm_enddate_1'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
