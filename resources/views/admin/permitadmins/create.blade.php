@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.permitadmin.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.permitadmins.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="submitted_by_id">{{ trans('cruds.permitadmin.fields.submitted_by') }}</label>
                <select class="form-control select2 {{ $errors->has('submitted_by') ? 'is-invalid' : '' }}" name="submitted_by_id" id="submitted_by_id">
                    @foreach($submitted_bies as $id => $submitted_by)
                        <option value="{{ $id }}" {{ old('submitted_by_id') == $id ? 'selected' : '' }}>{{ $submitted_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('submitted_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('submitted_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.submitted_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.permitadmin.fields.permit_approval') }}</label>
                <select class="form-control {{ $errors->has('permit_approval') ? 'is-invalid' : '' }}" name="permit_approval" id="permit_approval">
                    <option value disabled {{ old('permit_approval', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Permitadmin::PERMIT_APPROVAL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('permit_approval', 'PENDING') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('permit_approval'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permit_approval') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.permit_approval_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="workorder_1">{{ trans('cruds.permitadmin.fields.workorder_1') }}</label>
                <input class="form-control {{ $errors->has('workorder_1') ? 'is-invalid' : '' }}" type="text" name="workorder_1" id="workorder_1" value="{{ old('workorder_1', '') }}">
                @if($errors->has('workorder_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('workorder_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.workorder_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="workorder_2">{{ trans('cruds.permitadmin.fields.workorder_2') }}</label>
                <input class="form-control {{ $errors->has('workorder_2') ? 'is-invalid' : '' }}" type="text" name="workorder_2" id="workorder_2" value="{{ old('workorder_2', '') }}">
                @if($errors->has('workorder_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('workorder_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.workorder_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name_id">{{ trans('cruds.permitadmin.fields.name') }}</label>
                <select class="form-control select2 {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name_id" id="name_id">
                    @foreach($names as $id => $name)
                        <option value="{{ $id }}" {{ old('name_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_number_id">{{ trans('cruds.permitadmin.fields.project_number') }}</label>
                <select class="form-control select2 {{ $errors->has('project_number') ? 'is-invalid' : '' }}" name="project_number_id" id="project_number_id">
                    @foreach($project_numbers as $id => $project_number)
                        <option value="{{ $id }}" {{ old('project_number_id') == $id ? 'selected' : '' }}>{{ $project_number }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.project_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_manager_id">{{ trans('cruds.permitadmin.fields.project_manager') }}</label>
                <select class="form-control select2 {{ $errors->has('project_manager') ? 'is-invalid' : '' }}" name="project_manager_id" id="project_manager_id">
                    @foreach($project_managers as $id => $project_manager)
                        <option value="{{ $id }}" {{ old('project_manager_id') == $id ? 'selected' : '' }}>{{ $project_manager }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_manager'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_manager') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.project_manager_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_coordinator_id">{{ trans('cruds.permitadmin.fields.project_coordinator') }}</label>
                <select class="form-control select2 {{ $errors->has('project_coordinator') ? 'is-invalid' : '' }}" name="project_coordinator_id" id="project_coordinator_id">
                    @foreach($project_coordinators as $id => $project_coordinator)
                        <option value="{{ $id }}" {{ old('project_coordinator_id') == $id ? 'selected' : '' }}>{{ $project_coordinator }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_coordinator'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_coordinator') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.project_coordinator_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contractor_name_id">{{ trans('cruds.permitadmin.fields.contractor_name') }}</label>
                <select class="form-control select2 {{ $errors->has('contractor_name') ? 'is-invalid' : '' }}" name="contractor_name_id" id="contractor_name_id">
                    @foreach($contractor_names as $id => $contractor_name)
                        <option value="{{ $id }}" {{ old('contractor_name_id') == $id ? 'selected' : '' }}>{{ $contractor_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('contractor_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contractor_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.contractor_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contractor_supervisor_id">{{ trans('cruds.permitadmin.fields.contractor_supervisor') }}</label>
                <select class="form-control select2 {{ $errors->has('contractor_supervisor') ? 'is-invalid' : '' }}" name="contractor_supervisor_id" id="contractor_supervisor_id">
                    @foreach($contractor_supervisors as $id => $contractor_supervisor)
                        <option value="{{ $id }}" {{ old('contractor_supervisor_id') == $id ? 'selected' : '' }}>{{ $contractor_supervisor }}</option>
                    @endforeach
                </select>
                @if($errors->has('contractor_supervisor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contractor_supervisor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.contractor_supervisor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_supervisor_tel_id">{{ trans('cruds.permitadmin.fields.site_supervisor_tel') }}</label>
                <select class="form-control select2 {{ $errors->has('site_supervisor_tel') ? 'is-invalid' : '' }}" name="site_supervisor_tel_id" id="site_supervisor_tel_id">
                    @foreach($site_supervisor_tels as $id => $site_supervisor_tel)
                        <option value="{{ $id }}" {{ old('site_supervisor_tel_id') == $id ? 'selected' : '' }}>{{ $site_supervisor_tel }}</option>
                    @endforeach
                </select>
                @if($errors->has('site_supervisor_tel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_supervisor_tel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.site_supervisor_tel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_supervisor_email_id">{{ trans('cruds.permitadmin.fields.site_supervisor_email') }}</label>
                <select class="form-control select2 {{ $errors->has('site_supervisor_email') ? 'is-invalid' : '' }}" name="site_supervisor_email_id" id="site_supervisor_email_id">
                    @foreach($site_supervisor_emails as $id => $site_supervisor_email)
                        <option value="{{ $id }}" {{ old('site_supervisor_email_id') == $id ? 'selected' : '' }}>{{ $site_supervisor_email }}</option>
                    @endforeach
                </select>
                @if($errors->has('site_supervisor_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_supervisor_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.site_supervisor_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_site_id">{{ trans('cruds.permitadmin.fields.project_site') }}</label>
                <select class="form-control select2 {{ $errors->has('project_site') ? 'is-invalid' : '' }}" name="project_site_id" id="project_site_id">
                    @foreach($project_sites as $id => $project_site)
                        <option value="{{ $id }}" {{ old('project_site_id') == $id ? 'selected' : '' }}>{{ $project_site }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_site'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_site') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.project_site_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_building_id">{{ trans('cruds.permitadmin.fields.project_building') }}</label>
                <select class="form-control select2 {{ $errors->has('project_building') ? 'is-invalid' : '' }}" name="project_building_id" id="project_building_id">
                    @foreach($project_buildings as $id => $project_building)
                        <option value="{{ $id }}" {{ old('project_building_id') == $id ? 'selected' : '' }}>{{ $project_building }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_building'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_building') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.project_building_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_area_id">{{ trans('cruds.permitadmin.fields.project_area') }}</label>
                <select class="form-control select2 {{ $errors->has('project_area') ? 'is-invalid' : '' }}" name="project_area_id" id="project_area_id">
                    @foreach($project_areas as $id => $project_area)
                        <option value="{{ $id }}" {{ old('project_area_id') == $id ? 'selected' : '' }}>{{ $project_area }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_area'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_area') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.project_area_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="work_type_id">{{ trans('cruds.permitadmin.fields.work_type') }}</label>
                <select class="form-control select2 {{ $errors->has('work_type') ? 'is-invalid' : '' }}" name="work_type_id" id="work_type_id">
                    @foreach($work_types as $id => $work_type)
                        <option value="{{ $id }}" {{ old('work_type_id') == $id ? 'selected' : '' }}>{{ $work_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('work_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('work_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.work_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="permit_description">{{ trans('cruds.permitadmin.fields.permit_description') }}</label>
                <textarea class="form-control {{ $errors->has('permit_description') ? 'is-invalid' : '' }}" name="permit_description" id="permit_description">{{ old('permit_description') }}</textarea>
                @if($errors->has('permit_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permit_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.permit_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.permitadmin.fields.start_date') }}</label>
                <input class="form-control datetime {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_date">{{ trans('cruds.permitadmin.fields.end_date') }}</label>
                <input class="form-control datetime {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.permitadmin.fields.system_isolation_1') }}</label>
                <select class="form-control {{ $errors->has('system_isolation_1') ? 'is-invalid' : '' }}" name="system_isolation_1" id="system_isolation_1">
                    <option value disabled {{ old('system_isolation_1', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Permitadmin::SYSTEM_ISOLATION_1_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('system_isolation_1', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('system_isolation_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('system_isolation_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.system_isolation_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_date_iso_1">{{ trans('cruds.permitadmin.fields.start_date_iso_1') }}</label>
                <input class="form-control date {{ $errors->has('start_date_iso_1') ? 'is-invalid' : '' }}" type="text" name="start_date_iso_1" id="start_date_iso_1" value="{{ old('start_date_iso_1') }}">
                @if($errors->has('start_date_iso_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date_iso_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.start_date_iso_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_date_iso_1">{{ trans('cruds.permitadmin.fields.end_date_iso_1') }}</label>
                <input class="form-control date {{ $errors->has('end_date_iso_1') ? 'is-invalid' : '' }}" type="text" name="end_date_iso_1" id="end_date_iso_1" value="{{ old('end_date_iso_1') }}" required>
                @if($errors->has('end_date_iso_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date_iso_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.end_date_iso_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_time_iso_1">{{ trans('cruds.permitadmin.fields.start_time_iso_1') }}</label>
                <input class="form-control timepicker {{ $errors->has('start_time_iso_1') ? 'is-invalid' : '' }}" type="text" name="start_time_iso_1" id="start_time_iso_1" value="{{ old('start_time_iso_1') }}">
                @if($errors->has('start_time_iso_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_time_iso_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.start_time_iso_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_time_iso_1">{{ trans('cruds.permitadmin.fields.end_time_iso_1') }}</label>
                <input class="form-control timepicker {{ $errors->has('end_time_iso_1') ? 'is-invalid' : '' }}" type="text" name="end_time_iso_1" id="end_time_iso_1" value="{{ old('end_time_iso_1') }}" required>
                @if($errors->has('end_time_iso_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_time_iso_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.end_time_iso_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="system_iso_1_description">{{ trans('cruds.permitadmin.fields.system_iso_1_description') }}</label>
                <input class="form-control {{ $errors->has('system_iso_1_description') ? 'is-invalid' : '' }}" type="text" name="system_iso_1_description" id="system_iso_1_description" value="{{ old('system_iso_1_description', '') }}" required>
                @if($errors->has('system_iso_1_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('system_iso_1_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.system_iso_1_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="iso_1_contractor_id">{{ trans('cruds.permitadmin.fields.iso_1_contractor') }}</label>
                <select class="form-control select2 {{ $errors->has('iso_1_contractor') ? 'is-invalid' : '' }}" name="iso_1_contractor_id" id="iso_1_contractor_id">
                    @foreach($iso_1_contractors as $id => $iso_1_contractor)
                        <option value="{{ $id }}" {{ old('iso_1_contractor_id') == $id ? 'selected' : '' }}>{{ $iso_1_contractor }}</option>
                    @endforeach
                </select>
                @if($errors->has('iso_1_contractor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('iso_1_contractor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.iso_1_contractor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="iso_contractor_supervisor_id">{{ trans('cruds.permitadmin.fields.iso_contractor_supervisor') }}</label>
                <select class="form-control select2 {{ $errors->has('iso_contractor_supervisor') ? 'is-invalid' : '' }}" name="iso_contractor_supervisor_id" id="iso_contractor_supervisor_id">
                    @foreach($iso_contractor_supervisors as $id => $iso_contractor_supervisor)
                        <option value="{{ $id }}" {{ old('iso_contractor_supervisor_id') == $id ? 'selected' : '' }}>{{ $iso_contractor_supervisor }}</option>
                    @endforeach
                </select>
                @if($errors->has('iso_contractor_supervisor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('iso_contractor_supervisor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.iso_contractor_supervisor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="iso_supervisor_tel_id">{{ trans('cruds.permitadmin.fields.iso_supervisor_tel') }}</label>
                <select class="form-control select2 {{ $errors->has('iso_supervisor_tel') ? 'is-invalid' : '' }}" name="iso_supervisor_tel_id" id="iso_supervisor_tel_id">
                    @foreach($iso_supervisor_tels as $id => $iso_supervisor_tel)
                        <option value="{{ $id }}" {{ old('iso_supervisor_tel_id') == $id ? 'selected' : '' }}>{{ $iso_supervisor_tel }}</option>
                    @endforeach
                </select>
                @if($errors->has('iso_supervisor_tel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('iso_supervisor_tel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.iso_supervisor_tel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="iso_supervisor_email_id">{{ trans('cruds.permitadmin.fields.iso_supervisor_email') }}</label>
                <select class="form-control select2 {{ $errors->has('iso_supervisor_email') ? 'is-invalid' : '' }}" name="iso_supervisor_email_id" id="iso_supervisor_email_id">
                    @foreach($iso_supervisor_emails as $id => $iso_supervisor_email)
                        <option value="{{ $id }}" {{ old('iso_supervisor_email_id') == $id ? 'selected' : '' }}>{{ $iso_supervisor_email }}</option>
                    @endforeach
                </select>
                @if($errors->has('iso_supervisor_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('iso_supervisor_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.iso_supervisor_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="file_upload">{{ trans('cruds.permitadmin.fields.file_upload') }}</label>
                <div class="needsclick dropzone {{ $errors->has('file_upload') ? 'is-invalid' : '' }}" id="file_upload-dropzone">
                </div>
                @if($errors->has('file_upload'))
                    <div class="invalid-feedback">
                        {{ $errors->first('file_upload') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.file_upload_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="related_permit">{{ trans('cruds.permitadmin.fields.related_permit') }}</label>
                <input class="form-control {{ $errors->has('related_permit') ? 'is-invalid' : '' }}" type="text" name="related_permit" id="related_permit" value="{{ old('related_permit', '') }}">
                @if($errors->has('related_permit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('related_permit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.related_permit_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('hot_work_req') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="hot_work_req" value="0">
                    <input class="form-check-input" type="checkbox" name="hot_work_req" id="hot_work_req" value="1" {{ old('hot_work_req', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="hot_work_req">{{ trans('cruds.permitadmin.fields.hot_work_req') }}</label>
                </div>
                @if($errors->has('hot_work_req'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hot_work_req') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.hot_work_req_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('icra_req') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="icra_req" value="0">
                    <input class="form-check-input" type="checkbox" name="icra_req" id="icra_req" value="1" {{ old('icra_req', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="icra_req">{{ trans('cruds.permitadmin.fields.icra_req') }}</label>
                </div>
                @if($errors->has('icra_req'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_req') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.icra_req_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('hoarding_req') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="hoarding_req" value="0">
                    <input class="form-check-input" type="checkbox" name="hoarding_req" id="hoarding_req" value="1" {{ old('hoarding_req', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="hoarding_req">{{ trans('cruds.permitadmin.fields.hoarding_req') }}</label>
                </div>
                @if($errors->has('hoarding_req'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hoarding_req') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.hoarding_req_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('area_hazard') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="area_hazard" value="0">
                    <input class="form-check-input" type="checkbox" name="area_hazard" id="area_hazard" value="1" {{ old('area_hazard', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="area_hazard">{{ trans('cruds.permitadmin.fields.area_hazard') }}</label>
                </div>
                @if($errors->has('area_hazard'))
                    <div class="invalid-feedback">
                        {{ $errors->first('area_hazard') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.area_hazard_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('welding_brazing_silfoss') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="welding_brazing_silfoss" value="0">
                    <input class="form-check-input" type="checkbox" name="welding_brazing_silfoss" id="welding_brazing_silfoss" value="1" {{ old('welding_brazing_silfoss', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="welding_brazing_silfoss">{{ trans('cruds.permitadmin.fields.welding_brazing_silfoss') }}</label>
                </div>
                @if($errors->has('welding_brazing_silfoss'))
                    <div class="invalid-feedback">
                        {{ $errors->first('welding_brazing_silfoss') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.welding_brazing_silfoss_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type_of_abatement">{{ trans('cruds.permitadmin.fields.type_of_abatement') }}</label>
                <input class="form-control {{ $errors->has('type_of_abatement') ? 'is-invalid' : '' }}" type="text" name="type_of_abatement" id="type_of_abatement" value="{{ old('type_of_abatement', '') }}">
                @if($errors->has('type_of_abatement'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type_of_abatement') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.type_of_abatement_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('jha_swp') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="jha_swp" value="0">
                    <input class="form-check-input" type="checkbox" name="jha_swp" id="jha_swp" value="1" {{ old('jha_swp', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="jha_swp">{{ trans('cruds.permitadmin.fields.jha_swp') }}</label>
                </div>
                @if($errors->has('jha_swp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jha_swp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.jha_swp_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.permitadmin.fields.fall_protection_plan') }}</label>
                <select class="form-control {{ $errors->has('fall_protection_plan') ? 'is-invalid' : '' }}" name="fall_protection_plan" id="fall_protection_plan">
                    <option value disabled {{ old('fall_protection_plan', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Permitadmin::FALL_PROTECTION_PLAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('fall_protection_plan', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('fall_protection_plan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fall_protection_plan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.fall_protection_plan_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('confined_space_entry_plan') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="confined_space_entry_plan" value="0">
                    <input class="form-check-input" type="checkbox" name="confined_space_entry_plan" id="confined_space_entry_plan" value="1" {{ old('confined_space_entry_plan', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="confined_space_entry_plan">{{ trans('cruds.permitadmin.fields.confined_space_entry_plan') }}</label>
                </div>
                @if($errors->has('confined_space_entry_plan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('confined_space_entry_plan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.confined_space_entry_plan_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('mold_removal_plan') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="mold_removal_plan" value="0">
                    <input class="form-check-input" type="checkbox" name="mold_removal_plan" id="mold_removal_plan" value="1" {{ old('mold_removal_plan', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="mold_removal_plan">{{ trans('cruds.permitadmin.fields.mold_removal_plan') }}</label>
                </div>
                @if($errors->has('mold_removal_plan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mold_removal_plan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.mold_removal_plan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_conditions">{{ trans('cruds.permitadmin.fields.site_conditions') }}</label>
                <textarea class="form-control {{ $errors->has('site_conditions') ? 'is-invalid' : '' }}" name="site_conditions" id="site_conditions">{{ old('site_conditions') }}</textarea>
                @if($errors->has('site_conditions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_conditions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.site_conditions_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="additional_information">{{ trans('cruds.permitadmin.fields.additional_information') }}</label>
                <textarea class="form-control {{ $errors->has('additional_information') ? 'is-invalid' : '' }}" name="additional_information" id="additional_information">{{ old('additional_information') }}</textarea>
                @if($errors->has('additional_information'))
                    <div class="invalid-feedback">
                        {{ $errors->first('additional_information') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.additional_information_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="permit_approved_by_id">{{ trans('cruds.permitadmin.fields.permit_approved_by') }}</label>
                <select class="form-control select2 {{ $errors->has('permit_approved_by') ? 'is-invalid' : '' }}" name="permit_approved_by_id" id="permit_approved_by_id">
                    @foreach($permit_approved_bies as $id => $permit_approved_by)
                        <option value="{{ $id }}" {{ old('permit_approved_by_id') == $id ? 'selected' : '' }}>{{ $permit_approved_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('permit_approved_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permit_approved_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.permit_approved_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="permit_approval_date">{{ trans('cruds.permitadmin.fields.permit_approval_date') }}</label>
                <input class="form-control datetime {{ $errors->has('permit_approval_date') ? 'is-invalid' : '' }}" type="text" name="permit_approval_date" id="permit_approval_date" value="{{ old('permit_approval_date') }}">
                @if($errors->has('permit_approval_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permit_approval_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permitadmin.fields.permit_approval_date_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    var uploadedFileUploadMap = {}
Dropzone.options.fileUploadDropzone = {
    url: '{{ route('admin.permitadmins.storeMedia') }}',
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="file_upload[]" value="' + response.name + '">')
      uploadedFileUploadMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFileUploadMap[file.name]
      }
      $('form').find('input[name="file_upload[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($permitadmin) && $permitadmin->file_upload)
          var files =
            {!! json_encode($permitadmin->file_upload) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="file_upload[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection