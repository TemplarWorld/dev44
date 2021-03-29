<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Contractor extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'contractors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'contractor_contact',
        'contractor_street_address',
        'contractor_city',
        'contractor_state',
        'contractor_zip',
        'contractor_email',
        'contractor_247_tel',
        'contractor_tel',
        'contractor_tel_2',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function iso1ContractorPermitadmins()
    {
        return $this->hasMany(Permitadmin::class, 'iso_1_contractor_id', 'id');
    }

    public function contractorNameIcras()
    {
        return $this->hasMany(Icra::class, 'contractor_name_id', 'id');
    }

    public function contractorCompanyIdTags()
    {
        return $this->hasMany(IdTag::class, 'contractor_company_id', 'id');
    }

    public function contractorNamePermitadmins()
    {
        return $this->hasMany(Permitadmin::class, 'contractor_name_id', 'id');
    }

    public function subContractorsTimeProjects()
    {
        return $this->belongsToMany(TimeProject::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
