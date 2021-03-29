@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.idTag.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.id-tags.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.idTag.fields.name') }}
                        </th>
                        <td>
                            {{ $idTag->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.idTag.fields.email') }}
                        </th>
                        <td>
                            {{ $idTag->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.idTag.fields.ic_tel') }}
                        </th>
                        <td>
                            {{ $idTag->ic_tel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.idTag.fields.contractor_company') }}
                        </th>
                        <td>
                            {{ $idTag->contractor_company->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.idTag.fields.idtag_em_contact') }}
                        </th>
                        <td>
                            {{ $idTag->idtag_em_contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.idTag.fields.idtag_em_contact_tel') }}
                        </th>
                        <td>
                            {{ $idTag->idtag_em_contact_tel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.idTag.fields.idtag_address') }}
                        </th>
                        <td>
                            {{ $idTag->idtag_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.idTag.fields.idtag_city') }}
                        </th>
                        <td>
                            {{ $idTag->idtag_city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.idTag.fields.idtag_state') }}
                        </th>
                        <td>
                            {{ $idTag->idtag_state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.idTag.fields.idtag_zip') }}
                        </th>
                        <td>
                            {{ $idTag->idtag_zip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.idTag.fields.idtag_verified') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $idTag->idtag_verified ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.id-tags.index') }}">
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
            <a class="nav-link" href="#site_supervisor_tel_time_projects" role="tab" data-toggle="tab">
                {{ trans('cruds.timeProject.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#contractor_supervisor_time_projects" role="tab" data-toggle="tab">
                {{ trans('cruds.timeProject.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#site_supervisor_email_time_projects" role="tab" data-toggle="tab">
                {{ trans('cruds.timeProject.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#iso_contractor_supervisor_permitadmins" role="tab" data-toggle="tab">
                {{ trans('cruds.permitadmin.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#contractor_supervisor_icras" role="tab" data-toggle="tab">
                {{ trans('cruds.icra.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#site_supervisor_tel_icras" role="tab" data-toggle="tab">
                {{ trans('cruds.icra.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="site_supervisor_tel_time_projects">
            @includeIf('admin.idTags.relationships.siteSupervisorTelTimeProjects', ['timeProjects' => $idTag->siteSupervisorTelTimeProjects])
        </div>
        <div class="tab-pane" role="tabpanel" id="contractor_supervisor_time_projects">
            @includeIf('admin.idTags.relationships.contractorSupervisorTimeProjects', ['timeProjects' => $idTag->contractorSupervisorTimeProjects])
        </div>
        <div class="tab-pane" role="tabpanel" id="site_supervisor_email_time_projects">
            @includeIf('admin.idTags.relationships.siteSupervisorEmailTimeProjects', ['timeProjects' => $idTag->siteSupervisorEmailTimeProjects])
        </div>
        <div class="tab-pane" role="tabpanel" id="iso_contractor_supervisor_permitadmins">
            @includeIf('admin.idTags.relationships.isoContractorSupervisorPermitadmins', ['permitadmins' => $idTag->isoContractorSupervisorPermitadmins])
        </div>
        <div class="tab-pane" role="tabpanel" id="contractor_supervisor_icras">
            @includeIf('admin.idTags.relationships.contractorSupervisorIcras', ['icras' => $idTag->contractorSupervisorIcras])
        </div>
        <div class="tab-pane" role="tabpanel" id="site_supervisor_tel_icras">
            @includeIf('admin.idTags.relationships.siteSupervisorTelIcras', ['icras' => $idTag->siteSupervisorTelIcras])
        </div>
    </div>
</div>

@endsection