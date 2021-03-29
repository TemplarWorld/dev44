<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class TimeProject extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'time_projects';

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const PROJECT_GROUP_SELECT = [
        'fme'              => 'Facilities Management',
        'contractor'       => 'Contractor',
        'med_program'      => 'Medical Program',
        'site_dev'         => 'Site Development',
        'capital_projects' => 'Capital Projects',
    ];

    protected $fillable = [
        'name',
        'account_number',
        'roles_id',
        'project_coordinator_id',
        'project_number',
        'project_group',
        'contractor_name_id',
        'contractor_supervisor_id',
        'site_supervisor_tel_id',
        'site_supervisor_email_id',
        'site',
        'project_building',
        'project_area',
        'work_type_id',
        'project_description',
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function namePermitadmins()
    {
        return $this->hasMany(Permitadmin::class, 'name_id', 'id');
    }

    public function projectNumberPermitadmins()
    {
        return $this->hasMany(Permitadmin::class, 'project_number_id', 'id');
    }

    public function projectSitePermitadmins()
    {
        return $this->hasMany(Permitadmin::class, 'project_site_id', 'id');
    }

    public function projectBuildingPermitadmins()
    {
        return $this->hasMany(Permitadmin::class, 'project_building_id', 'id');
    }

    public function projectAreaPermitadmins()
    {
        return $this->hasMany(Permitadmin::class, 'project_area_id', 'id');
    }

    public function projectNameIcras()
    {
        return $this->hasMany(Icra::class, 'project_name_id', 'id');
    }

    public function projectNumberIcras()
    {
        return $this->hasMany(Icra::class, 'project_number_id', 'id');
    }

    public function projectNameDrawingRequests()
    {
        return $this->hasMany(DrawingRequest::class, 'project_name_id', 'id');
    }

    public function projectGroupDrawingRequests()
    {
        return $this->hasMany(DrawingRequest::class, 'project_group_id', 'id');
    }

    public function projectBuildingDrawingRequests()
    {
        return $this->hasMany(DrawingRequest::class, 'project_building_id', 'id');
    }

    public function projectAreaDrawingRequests()
    {
        return $this->hasMany(DrawingRequest::class, 'project_area_id', 'id');
    }

    public function projectNameCommissionings()
    {
        return $this->hasMany(Commissioning::class, 'project_name_id', 'id');
    }

    public function roles()
    {
        return $this->belongsTo(User::class, 'roles_id');
    }

    public function project_coordinator()
    {
        return $this->belongsTo(User::class, 'project_coordinator_id');
    }

    public function contractor_name()
    {
        return $this->belongsTo(Contractor::class, 'contractor_name_id');
    }

    public function contractor_supervisor()
    {
        return $this->belongsTo(IdTag::class, 'contractor_supervisor_id');
    }

    public function site_supervisor_tel()
    {
        return $this->belongsTo(IdTag::class, 'site_supervisor_tel_id');
    }

    public function site_supervisor_email()
    {
        return $this->belongsTo(IdTag::class, 'site_supervisor_email_id');
    }

    public function sub_contractors()
    {
        return $this->belongsToMany(Contractor::class);
    }

    public function work_type()
    {
        return $this->belongsTo(TimeWorkType::class, 'work_type_id');
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getEndDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function team()
    {
        return $this->belongsTo(User::class, 'team_id');
    }
}
