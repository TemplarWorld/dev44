<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Approval extends Model
{
    use SoftDeletes;

    public $table = 'approvals';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'permit_approval_name',
        'permit_approval_department',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const PERMIT_APPROVAL_DEPARTMENT_SELECT = [
        'permit_app_fm' => 'FM',
        'permit_app_hs' => 'Health & Safety',
        'permit_app_mp' => 'Medical Program',
        'permit_app_cp' => 'Capital Projects',
        'permit_app_sa' => 'Site Administration',
        'permit_app-ic' => 'Infection Prevention & Control',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function permitApprovedByPermitadmins()
    {
        return $this->hasMany(Permitadmin::class, 'permit_approved_by_id', 'id');
    }

    public function drApprovalDrawingRequests()
    {
        return $this->hasMany(DrawingRequest::class, 'dr_approval_id', 'id');
    }
}
