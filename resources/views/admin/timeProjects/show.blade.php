@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.timeProject.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.time-projects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.name') }}
                        </th>
                        <td>
                            {{ $timeProject->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.account_number') }}
                        </th>
                        <td>
                            {{ $timeProject->account_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.roles') }}
                        </th>
                        <td>
                            {{ $timeProject->roles->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.project_coordinator') }}
                        </th>
                        <td>
                            {{ $timeProject->project_coordinator->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.project_number') }}
                        </th>
                        <td>
                            {{ $timeProject->project_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.project_group') }}
                        </th>
                        <td>
                            {{ App\TimeProject::PROJECT_GROUP_SELECT[$timeProject->project_group] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.contractor_name') }}
                        </th>
                        <td>
                            {{ $timeProject->contractor_name->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.contractor_supervisor') }}
                        </th>
                        <td>
                            {{ $timeProject->contractor_supervisor->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.site_supervisor_tel') }}
                        </th>
                        <td>
                            {{ $timeProject->site_supervisor_tel->ic_tel ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.site_supervisor_email') }}
                        </th>
                        <td>
                            {{ $timeProject->site_supervisor_email->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.sub_contractors') }}
                        </th>
                        <td>
                            @foreach($timeProject->sub_contractors as $key => $sub_contractors)
                                <span class="label label-info">{{ $sub_contractors->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.site') }}
                        </th>
                        <td>
                            {{ $timeProject->site }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.project_building') }}
                        </th>
                        <td>
                            {{ $timeProject->project_building }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.project_area') }}
                        </th>
                        <td>
                            {{ $timeProject->project_area }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.work_type') }}
                        </th>
                        <td>
                            {{ $timeProject->work_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.project_description') }}
                        </th>
                        <td>
                            {{ $timeProject->project_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.start_date') }}
                        </th>
                        <td>
                            {{ $timeProject->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.end_date') }}
                        </th>
                        <td>
                            {{ $timeProject->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.created_at') }}
                        </th>
                        <td>
                            {{ $timeProject->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timeProject.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $timeProject->updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.time-projects.index') }}">
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
            <a class="nav-link" href="#name_permitadmins" role="tab" data-toggle="tab">
                {{ trans('cruds.permitadmin.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_number_permitadmins" role="tab" data-toggle="tab">
                {{ trans('cruds.permitadmin.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_site_permitadmins" role="tab" data-toggle="tab">
                {{ trans('cruds.permitadmin.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_building_permitadmins" role="tab" data-toggle="tab">
                {{ trans('cruds.permitadmin.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_area_permitadmins" role="tab" data-toggle="tab">
                {{ trans('cruds.permitadmin.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_name_icras" role="tab" data-toggle="tab">
                {{ trans('cruds.icra.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_number_icras" role="tab" data-toggle="tab">
                {{ trans('cruds.icra.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_name_drawing_requests" role="tab" data-toggle="tab">
                {{ trans('cruds.drawingRequest.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_group_drawing_requests" role="tab" data-toggle="tab">
                {{ trans('cruds.drawingRequest.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_building_drawing_requests" role="tab" data-toggle="tab">
                {{ trans('cruds.drawingRequest.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_area_drawing_requests" role="tab" data-toggle="tab">
                {{ trans('cruds.drawingRequest.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_name_commissionings" role="tab" data-toggle="tab">
                {{ trans('cruds.commissioning.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="name_permitadmins">
            @includeIf('admin.timeProjects.relationships.namePermitadmins', ['permitadmins' => $timeProject->namePermitadmins])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_number_permitadmins">
            @includeIf('admin.timeProjects.relationships.projectNumberPermitadmins', ['permitadmins' => $timeProject->projectNumberPermitadmins])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_site_permitadmins">
            @includeIf('admin.timeProjects.relationships.projectSitePermitadmins', ['permitadmins' => $timeProject->projectSitePermitadmins])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_building_permitadmins">
            @includeIf('admin.timeProjects.relationships.projectBuildingPermitadmins', ['permitadmins' => $timeProject->projectBuildingPermitadmins])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_area_permitadmins">
            @includeIf('admin.timeProjects.relationships.projectAreaPermitadmins', ['permitadmins' => $timeProject->projectAreaPermitadmins])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_name_icras">
            @includeIf('admin.timeProjects.relationships.projectNameIcras', ['icras' => $timeProject->projectNameIcras])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_number_icras">
            @includeIf('admin.timeProjects.relationships.projectNumberIcras', ['icras' => $timeProject->projectNumberIcras])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_name_drawing_requests">
            @includeIf('admin.timeProjects.relationships.projectNameDrawingRequests', ['drawingRequests' => $timeProject->projectNameDrawingRequests])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_group_drawing_requests">
            @includeIf('admin.timeProjects.relationships.projectGroupDrawingRequests', ['drawingRequests' => $timeProject->projectGroupDrawingRequests])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_building_drawing_requests">
            @includeIf('admin.timeProjects.relationships.projectBuildingDrawingRequests', ['drawingRequests' => $timeProject->projectBuildingDrawingRequests])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_area_drawing_requests">
            @includeIf('admin.timeProjects.relationships.projectAreaDrawingRequests', ['drawingRequests' => $timeProject->projectAreaDrawingRequests])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_name_commissionings">
            @includeIf('admin.timeProjects.relationships.projectNameCommissionings', ['commissionings' => $timeProject->projectNameCommissionings])
        </div>
    </div>
</div>

@endsection