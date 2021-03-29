@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.two_factor') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->two_factor ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.telephone') }}
                        </th>
                        <td>
                            {{ $user->telephone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.street_address') }}
                        </th>
                        <td>
                            {{ $user->street_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.city') }}
                        </th>
                        <td>
                            {{ $user->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.state_province') }}
                        </th>
                        <td>
                            {{ $user->state_province }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.country') }}
                        </th>
                        <td>
                            {{ $user->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.zip_postal_code') }}
                        </th>
                        <td>
                            {{ $user->zip_postal_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.created_at') }}
                        </th>
                        <td>
                            {{ $user->created_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
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
            <a class="nav-link" href="#team_time_projects" role="tab" data-toggle="tab">
                {{ trans('cruds.timeProject.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#roles_time_projects" role="tab" data-toggle="tab">
                {{ trans('cruds.timeProject.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_coordinator_time_projects" role="tab" data-toggle="tab">
                {{ trans('cruds.timeProject.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_manager_permitadmins" role="tab" data-toggle="tab">
                {{ trans('cruds.permitadmin.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_coordinator_permitadmins" role="tab" data-toggle="tab">
                {{ trans('cruds.permitadmin.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#submitted_by_permitadmins" role="tab" data-toggle="tab">
                {{ trans('cruds.permitadmin.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_manager_drawing_requests" role="tab" data-toggle="tab">
                {{ trans('cruds.drawingRequest.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project_coordinator_drawing_requests" role="tab" data-toggle="tab">
                {{ trans('cruds.drawingRequest.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_user_alerts" role="tab" data-toggle="tab">
                {{ trans('cruds.userAlert.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="team_time_projects">
            @includeIf('admin.users.relationships.teamTimeProjects', ['timeProjects' => $user->teamTimeProjects])
        </div>
        <div class="tab-pane" role="tabpanel" id="roles_time_projects">
            @includeIf('admin.users.relationships.rolesTimeProjects', ['timeProjects' => $user->rolesTimeProjects])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_coordinator_time_projects">
            @includeIf('admin.users.relationships.projectCoordinatorTimeProjects', ['timeProjects' => $user->projectCoordinatorTimeProjects])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_manager_permitadmins">
            @includeIf('admin.users.relationships.projectManagerPermitadmins', ['permitadmins' => $user->projectManagerPermitadmins])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_coordinator_permitadmins">
            @includeIf('admin.users.relationships.projectCoordinatorPermitadmins', ['permitadmins' => $user->projectCoordinatorPermitadmins])
        </div>
        <div class="tab-pane" role="tabpanel" id="submitted_by_permitadmins">
            @includeIf('admin.users.relationships.submittedByPermitadmins', ['permitadmins' => $user->submittedByPermitadmins])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_manager_drawing_requests">
            @includeIf('admin.users.relationships.projectManagerDrawingRequests', ['drawingRequests' => $user->projectManagerDrawingRequests])
        </div>
        <div class="tab-pane" role="tabpanel" id="project_coordinator_drawing_requests">
            @includeIf('admin.users.relationships.projectCoordinatorDrawingRequests', ['drawingRequests' => $user->projectCoordinatorDrawingRequests])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_user_alerts">
            @includeIf('admin.users.relationships.userUserAlerts', ['userAlerts' => $user->userUserAlerts])
        </div>
    </div>
</div>

@endsection