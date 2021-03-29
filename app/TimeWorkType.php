<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class TimeWorkType extends Model
{
    use SoftDeletes;

    public $table = 'time_work_types';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const NAME_SELECT = [
        'renovation'                                       => 'Renovation',
        'new_construction_addition'                        => 'New Construction Addition',
        'new_construction_greenfield'                      => 'New Construction Greenfield (New unattached building)',
        'remediation'                                      => 'Remediation (Fire / Flood / Damage, etc)',
        'hazardous'                                        => 'Hazardous Material Removal (Asbestos, Chemical, Mold, etc.)',
        'equipment'                                        => 'Equipment Installation',
        'exterior_siteworks'                               => 'General Exterior Siteworks',
        'interior_siteworks'                               => 'General Interior Siteworks',
        'inspections_serviceworks_preventative_consulting' => 'General Inspections, Preventative Maintenance, Consulting, etc',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function workTypeTimeProjects()
    {
        return $this->hasMany(TimeProject::class, 'work_type_id', 'id');
    }

    public function workTypePermitadmins()
    {
        return $this->hasMany(Permitadmin::class, 'work_type_id', 'id');
    }
}
