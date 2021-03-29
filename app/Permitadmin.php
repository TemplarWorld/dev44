<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Permitadmin extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, HasMediaTrait;

    public $table = 'permitadmins';

    protected $appends = [
        'file_upload',
    ];

    const FALL_PROTECTION_PLAN_SELECT = [

    ];

    protected $dates = [
        'start_date',
        'end_date',
        'start_date_iso_1',
        'end_date_iso_1',
        'permit_approval_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const PERMIT_APPROVAL_SELECT = [
        'permit_pending'   => 'PENDING',
        'permit_approved'  => 'APPROVED',
        'permit_updated'   => 'UPDATED - APPROVED',
        'permit_hold'      => 'ON HOLD',
        'permit_suspended' => 'SUSPENDED',
        'permit_denied'    => 'DENIED',
        'permit_cancel'    => 'CANCELLED',
    ];

    const SYSTEM_ISOLATION_1_SELECT = [
        'mechanical_isolation'    => 'Mechanical',
        'hvac_isolation'          => 'HVAC',
        'electrical_isolation'    => 'Electrical',
        'electronics_isolation'   => 'Electronics / Instrumentation / Controls',
        'refrigeration_isolation' => 'Refrigeration',
        'equipment_isolation'     => 'Equipment',
        'elevator_isolation'      => 'Elevator',
        'architectural_isolation' => 'Architectural',
        'site_isolations'         => 'Site - Interior and Exterior',
    ];

    protected $fillable = [
        'submitted_by_id',
        'permit_approval',
        'workorder_1',
        'workorder_2',
        'name_id',
        'project_number_id',
        'project_manager_id',
        'project_coordinator_id',
        'contractor_name_id',
        'contractor_supervisor_id',
        'site_supervisor_tel_id',
        'site_supervisor_email_id',
        'team_id',
        'project_site_id',
        'project_building_id',
        'project_area_id',
        'work_type_id',
        'permit_description',
        'start_date',
        'end_date',
        'system_isolation_1',
        'start_date_iso_1',
        'end_date_iso_1',
        'start_time_iso_1',
        'end_time_iso_1',
        'system_iso_1_description',
        'iso_1_contractor_id',
        'iso_contractor_supervisor_id',
        'iso_supervisor_tel_id',
        'iso_supervisor_email_id',
        'related_permit',
        'hot_work_req',
        'icra_req',
        'hoarding_req',
        'area_hazard',
        'welding_brazing_silfoss',
        'type_of_abatement',
        'jha_swp',
        'fall_protection_plan',
        'confined_space_entry_plan',
        'mold_removal_plan',
        'site_conditions',
        'additional_information',
        'permit_approved_by_id',
        'permit_approval_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function submitted_by()
    {
        return $this->belongsTo(User::class, 'submitted_by_id');
    }

    public function name()
    {
        return $this->belongsTo(TimeProject::class, 'name_id');
    }

    public function project_number()
    {
        return $this->belongsTo(TimeProject::class, 'project_number_id');
    }

    public function project_manager()
    {
        return $this->belongsTo(User::class, 'project_manager_id');
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

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function project_site()
    {
        return $this->belongsTo(TimeProject::class, 'project_site_id');
    }

    public function project_building()
    {
        return $this->belongsTo(TimeProject::class, 'project_building_id');
    }

    public function project_area()
    {
        return $this->belongsTo(TimeProject::class, 'project_area_id');
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

    public function getStartDateIso1Attribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartDateIso1Attribute($value)
    {
        $this->attributes['start_date_iso_1'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getEndDateIso1Attribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEndDateIso1Attribute($value)
    {
        $this->attributes['end_date_iso_1'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function iso_1_contractor()
    {
        return $this->belongsTo(Contractor::class, 'iso_1_contractor_id');
    }

    public function iso_contractor_supervisor()
    {
        return $this->belongsTo(IdTag::class, 'iso_contractor_supervisor_id');
    }

    public function iso_supervisor_tel()
    {
        return $this->belongsTo(IdTag::class, 'iso_supervisor_tel_id');
    }

    public function iso_supervisor_email()
    {
        return $this->belongsTo(IdTag::class, 'iso_supervisor_email_id');
    }

    public function getFileUploadAttribute()
    {
        return $this->getMedia('file_upload');
    }

    public function permit_approved_by()
    {
        return $this->belongsTo(Approval::class, 'permit_approved_by_id');
    }

    public function getPermitApprovalDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setPermitApprovalDateAttribute($value)
    {
        $this->attributes['permit_approval_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
