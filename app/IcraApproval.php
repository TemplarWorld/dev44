<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class IcraApproval extends Model
{
    use SoftDeletes;

    public $table = 'icra_approvals';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'icra_app_dept',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const ICRA_APP_DEPT_SELECT = [
        'icra_app_ic' => 'Infection Prevention & Control',
        'icra_app_hs' => 'Health & Safety',
        'icra_app_fm' => 'FM',
        'icra_app_cp' => 'Capital Projects',
        'icra_app_cn' => 'Contractor',
        'icra_app_mp' => 'Medical Program',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function icraApprovedBy1Icras()
    {
        return $this->hasMany(Icra::class, 'icra_approved_by_1_id', 'id');
    }

    public function icraApprovedBy2Icras()
    {
        return $this->hasMany(Icra::class, 'icra_approved_by_2_id', 'id');
    }

    public function icraApprovedBy3Icras()
    {
        return $this->hasMany(Icra::class, 'icra_approved_by_3_id', 'id');
    }

    public function icraApprovedBy4Icras()
    {
        return $this->hasMany(Icra::class, 'icra_approved_by_4_id', 'id');
    }
}
