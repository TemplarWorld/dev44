<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class DrawingRequest extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'drawing_requests';

    protected $dates = [
        'created_at',
        'date_required',
        'updated_at',
        'deleted_at',
    ];

    const DR_1_TYPE_SELECT = [
        'dr1_cad'  => 'CAD',
        'dr1_pdf'  => 'PDF',
        'dr1_oem'  => 'OEM',
        'dr1_spec' => 'Specifications (Book / File)',
    ];

    const DR_2_TYPE_SELECT = [
        'dr2_cad'  => 'CAD',
        'dr2_pdf'  => 'PDF',
        'dr2_oem'  => 'OEM',
        'dr2_spec' => 'Specifications (Book / File)',
    ];

    const DR_1_DISCIPLINE_SELECT = [
        'dr_arch1'   => 'Architectural',
        'dr_struct1' => 'Structural',
        'dr_elect1'  => 'Electrical',
        'dr_mech1'   => 'Mechanical',
    ];

    const DR_2_DISCIPLINE_SELECT = [
        'dr2_arch'   => 'Architectural',
        'dr2_struct' => 'Structural',
        'dr2_elect'  => 'Electrical',
        'dr2_mech'   => 'Mechanical',
    ];

    const DR_2_CIVIL_SELECT = [
        'dr_civ2_site_loc'     => 'Site Location',
        'dr_civ2_site_dev'     => 'Site Development',
        'dr_civ2_site_landsc'  => 'Landscaping',
        'dr_civ2_site_siteown' => 'Site Ownership',
    ];

    const DR_1_CIVIL_SELECT = [
        'dr_civ1_site_loc'    => 'Site Location',
        'dr_civ1_site_dev'    => 'Site Development Plan',
        'dr_civ1_site_landsc' => 'Landscaping',
        'dr_civ1_site_steown' => 'Site Ownership',
    ];

    protected $fillable = [
        'created_at',
        'tracking_number',
        'dr_approval_id',
        'dr_requested_by',
        'date_required',
        'project_name_id',
        'project_manager_id',
        'project_coordinator_id',
        'project_description',
        'project_group_id',
        'project_building_id',
        'project_area_id',
        'dr_1_discipline',
        'dr_1_type',
        'dr_1_type_description',
        'project_building_2',
        'project_area_2',
        'dr_2_discipline',
        'dr_2_type',
        'dr_2_type_description',
        'project_building_3',
        'project_area_3',
        'dr_3_type',
        'dr_1_civil',
        'dr_2_civil',
        'civil_other',
        'civil_descrip',
        'drawing_number_title',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function dr_approval()
    {
        return $this->belongsTo(Approval::class, 'dr_approval_id');
    }

    public function getDateRequiredAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateRequiredAttribute($value)
    {
        $this->attributes['date_required'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
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

    public function project_group()
    {
        return $this->belongsTo(TimeProject::class, 'project_group_id');
    }

    public function project_building()
    {
        return $this->belongsTo(TimeProject::class, 'project_building_id');
    }

    public function project_area()
    {
        return $this->belongsTo(TimeProject::class, 'project_area_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
