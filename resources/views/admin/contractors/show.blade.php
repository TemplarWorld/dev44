@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.contractor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contractors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.id') }}
                        </th>
                        <td>
                            {{ $contractor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.name') }}
                        </th>
                        <td>
                            {{ $contractor->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.contractor_contact') }}
                        </th>
                        <td>
                            {{ $contractor->contractor_contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.contractor_street_address') }}
                        </th>
                        <td>
                            {{ $contractor->contractor_street_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.contractor_city') }}
                        </th>
                        <td>
                            {{ $contractor->contractor_city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.contractor_state') }}
                        </th>
                        <td>
                            {{ $contractor->contractor_state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.contractor_zip') }}
                        </th>
                        <td>
                            {{ $contractor->contractor_zip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.contractor_email') }}
                        </th>
                        <td>
                            {{ $contractor->contractor_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.contractor_247_tel') }}
                        </th>
                        <td>
                            {{ $contractor->contractor_247_tel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.contractor_tel') }}
                        </th>
                        <td>
                            {{ $contractor->contractor_tel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contractor.fields.contractor_tel_2') }}
                        </th>
                        <td>
                            {{ $contractor->contractor_tel_2 }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contractors.index') }}">
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
            <a class="nav-link" href="#iso1_contractor_permitadmins" role="tab" data-toggle="tab">
                {{ trans('cruds.permitadmin.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#contractor_name_icras" role="tab" data-toggle="tab">
                {{ trans('cruds.icra.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#contractor_company_id_tags" role="tab" data-toggle="tab">
                {{ trans('cruds.idTag.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#contractor_name_permitadmins" role="tab" data-toggle="tab">
                {{ trans('cruds.permitadmin.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#sub_contractors_time_projects" role="tab" data-toggle="tab">
                {{ trans('cruds.timeProject.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="iso1_contractor_permitadmins">
            @includeIf('admin.contractors.relationships.iso1ContractorPermitadmins', ['permitadmins' => $contractor->iso1ContractorPermitadmins])
        </div>
        <div class="tab-pane" role="tabpanel" id="contractor_name_icras">
            @includeIf('admin.contractors.relationships.contractorNameIcras', ['icras' => $contractor->contractorNameIcras])
        </div>
        <div class="tab-pane" role="tabpanel" id="contractor_company_id_tags">
            @includeIf('admin.contractors.relationships.contractorCompanyIdTags', ['idTags' => $contractor->contractorCompanyIdTags])
        </div>
        <div class="tab-pane" role="tabpanel" id="contractor_name_permitadmins">
            @includeIf('admin.contractors.relationships.contractorNamePermitadmins', ['permitadmins' => $contractor->contractorNamePermitadmins])
        </div>
        <div class="tab-pane" role="tabpanel" id="sub_contractors_time_projects">
            @includeIf('admin.contractors.relationships.subContractorsTimeProjects', ['timeProjects' => $contractor->subContractorsTimeProjects])
        </div>
    </div>
</div>

@endsection