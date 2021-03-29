<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class InformationRequest extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'information_requests';

    protected $dates = [
        'created_at',
        'info_date_req',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'created_at',
        'requested_by',
        'info_tel',
        'req_email',
        'project_name',
        'project_manager_id',
        'info_date_req',
        'info_descrip',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function project_manager()
    {
        return $this->belongsTo(User::class, 'project_manager_id');
    }

    public function getInfoDateReqAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setInfoDateReqAttribute($value)
    {
        $this->attributes['info_date_req'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
