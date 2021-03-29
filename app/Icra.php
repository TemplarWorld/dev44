<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Icra extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'icras';

    const ICRA_AREAS_IMPACT_SIDE_C_SELECT = [
        'icra_imp_I_sc' => 'IV',
    ];

    const ICRA_HEPA_UNIT_SELECT = [
        'icra_hepa_y' => 'Yes',
        'icra_hepa_n' => 'No',
    ];

    const ICRA_EXHAUST_SELECT = [
        'icra_exhaust_y' => 'Yes',
        'icra_exhaust_n' => 'No',
    ];

    const ICRA_PMD_SELECT = [
        'icra-i'   => 'I',
        'icra-ii'  => 'II',
        'icra-iii' => 'III',
        'icra-iv'  => 'IV',
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'icra_approval_date',
        'updated_at',
        'deleted_at',
    ];

    const ICRA_AREAS_IMPACT_SIDE_A_SELECT = [
        'icra_imp_I_sa'  => 'I',
        'icra_imp_II_sa' => 'II',
        'icra_imp_III'   => 'III',
        'icra_imp_IV'    => 'IV',
    ];

    const ICRA_AREAS_IMPACT_SIDE_B_SELECT = [
        'icra_imp_I_sa'   => 'I',
        'icra_imp_II_sa'  => 'II',
        'icra_imp_III_sa' => 'III',
        'icra_imp_IV_sa'  => 'IV',
    ];

    const ICRA_AREAS_IMPACT_SIDE_D_SELECT = [
        'icra_imp_I_sa'   => 'I',
        'icra_imp_II_sb'  => 'II',
        'icra_imp_III_sc' => 'III',
        'icra_imp_IV_sd'  => 'IV',
    ];

    const ICRA_HOARDING_TYPE_SELECT = [
        'icra_soft_hoarding'      => 'Soft',
        'icra_soft_hoarding_ante' => 'Soft with Anteroom',
        'icra_hard_hoarding'      => 'Hard',
        'icra_hard_hoarding_ante' => 'Hard with Anteroom',
        'icra_mobile'             => 'Portable / Mobile',
        'icra_none'               => 'None Required',
    ];

    protected $fillable = [
        'project_name_id',
        'project_number_id',
        'project_manager_id',
        'project_coordinator_id',
        'contractor_name_id',
        'contractor_supervisor_id',
        'site_supervisor_tel_id',
        'project_site_id',
        'project_building_id',
        'project_area_id',
        'work_type_id',
        'project_description_id',
        'icra_program',
        'start_date',
        'end_date',
        'created_at',
        'type_a',
        'type_b',
        'type_c',
        'type_d',
        'group_1',
        'group_2',
        'group_3',
        'group_4',
        'icra_pmd',
        'icra_areas_impact_side_a',
        'icra_areas_impact_side_b',
        'icra_areas_impact_side_c',
        'icra_areas_impact_side_d',
        'icra_notes',
        'icra_hoarding_type',
        'icra_ante_pressure',
        'icra_const_area_pressure',
        'icra_hepa_unit',
        'icra_exhaust',
        'icra_pressure_mon',
        'icra_additional',
        'icra_requested_by',
        'icra_approved_by_1_id',
        'icra_approved_by_2_id',
        'icra_approved_by_3_id',
        'icra_approved_by_4_id',
        'icra_approval_date',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function project_name()
    {
        return $this->belongsTo(TimeProject::class, 'project_name_id');
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

    public function project_description()
    {
        return $this->belongsTo(TimeProject::class, 'project_description_id');
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

    public function icra_approved_by_1()
    {
        return $this->belongsTo(IcraApproval::class, 'icra_approved_by_1_id');
    }

    public function icra_approved_by_2()
    {
        return $this->belongsTo(IcraApproval::class, 'icra_approved_by_2_id');
    }

    public function icra_approved_by_3()
    {
        return $this->belongsTo(IcraApproval::class, 'icra_approved_by_3_id');
    }

    public function icra_approved_by_4()
    {
        return $this->belongsTo(IcraApproval::class, 'icra_approved_by_4_id');
    }

    public function getIcraApprovalDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setIcraApprovalDateAttribute($value)
    {
        $this->attributes['icra_approval_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
