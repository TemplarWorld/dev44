<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class IdTag extends Model
{
    use SoftDeletes;

    public $table = 'id_tags';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'ic_tel',
        'contractor_company_id',
        'idtag_em_contact',
        'idtag_em_contact_tel',
        'idtag_address',
        'idtag_city',
        'idtag_state',
        'idtag_zip',
        'idtag_verified',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function siteSupervisorTelTimeProjects()
    {
        return $this->hasMany(TimeProject::class, 'site_supervisor_tel_id', 'id');
    }

    public function contractorSupervisorTimeProjects()
    {
        return $this->hasMany(TimeProject::class, 'contractor_supervisor_id', 'id');
    }

    public function siteSupervisorEmailTimeProjects()
    {
        return $this->hasMany(TimeProject::class, 'site_supervisor_email_id', 'id');
    }

    public function isoContractorSupervisorPermitadmins()
    {
        return $this->hasMany(Permitadmin::class, 'iso_contractor_supervisor_id', 'id');
    }

    public function contractorSupervisorIcras()
    {
        return $this->hasMany(Icra::class, 'contractor_supervisor_id', 'id');
    }

    public function siteSupervisorTelIcras()
    {
        return $this->hasMany(Icra::class, 'site_supervisor_tel_id', 'id');
    }

    public function contractor_company()
    {
        return $this->belongsTo(Contractor::class, 'contractor_company_id');
    }
}
