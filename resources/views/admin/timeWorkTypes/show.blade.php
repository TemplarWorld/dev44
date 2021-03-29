@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.timeWorkType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.time-work-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.timeWorkType.fields.name') }}
                        </th>
                        <td>
                            {{ App\TimeWorkType::NAME_SELECT[$timeWorkType->name] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.time-work-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#work_type_time_projects" role="tab" data-toggle="tab">
                {{ trans('cruds.timeProject.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#work_type_permitadmins" role="tab" data-toggle="tab">
                {{ trans('cruds.permitadmin.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="work_type_time_projects">
            @includeIf('admin.timeWorkTypes.relationships.workTypeTimeProjects', ['timeProjects' => $timeWorkType->workTypeTimeProjects])
        </div>
        <div class="tab-pane" role="tabpanel" id="work_type_permitadmins">
            @includeIf('admin.timeWorkTypes.relationships.workTypePermitadmins', ['permitadmins' => $timeWorkType->workTypePermitadmins])
        </div>
    </div>
</div>

@endsection