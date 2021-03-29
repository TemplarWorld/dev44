@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.timeProject.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.time-projects.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.timeProject.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeProject.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_number">{{ trans('cruds.timeProject.fields.account_number') }}</label>
                <input class="form-control {{ $errors->has('account_number') ? 'is-invalid' : '' }}" type="text" name="account_number" id="account_number" value="{{ old('account_number', '') }}">
                @if($errors->has('account_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeProject.fields.account_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="roles_id">{{ trans('cruds.timeProject.fields.roles') }}</label>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles_id" id="roles_id">
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ old('roles_id') == $id ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <div class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeProject.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_coordinator_id">{{ trans('cruds.timeProject.fields.project_coordinator') }}</label>
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
                <span class="help-block">{{ trans('cruds.timeProject.fields.project_coordinator_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_number">{{ trans('cruds.timeProject.fields.project_number') }}</label>
                <input class="form-control {{ $errors->has('project_number') ? 'is-invalid' : '' }}" type="text" name="project_number" id="project_number" value="{{ old('project_number', '') }}">
                @if($errors->has('project_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeProject.fields.project_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.timeProject.fields.project_group') }}</label>
                <select class="form-control {{ $errors->has('project_group') ? 'is-invalid' : '' }}" name="project_group" id="project_group" required>
                    <option value disabled {{ old('project_group', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\TimeProject::PROJECT_GROUP_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('project_group', 'Select') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_group'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_group') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeProject.fields.project_group_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contractor_name_id">{{ trans('cruds.timeProject.fields.contractor_name') }}</label>
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
                <span class="help-block">{{ trans('cruds.timeProject.fields.contractor_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contractor_supervisor_id">{{ trans('cruds.timeProject.fields.contractor_supervisor') }}</label>
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
                <span class="help-block">{{ trans('cruds.timeProject.fields.contractor_supervisor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_supervisor_tel_id">{{ trans('cruds.timeProject.fields.site_supervisor_tel') }}</label>
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
                <span class="help-block">{{ trans('cruds.timeProject.fields.site_supervisor_tel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_supervisor_email_id">{{ trans('cruds.timeProject.fields.site_supervisor_email') }}</label>
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
                <span class="help-block">{{ trans('cruds.timeProject.fields.site_supervisor_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_contractors">{{ trans('cruds.timeProject.fields.sub_contractors') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('sub_contractors') ? 'is-invalid' : '' }}" name="sub_contractors[]" id="sub_contractors" multiple>
                    @foreach($sub_contractors as $id => $sub_contractors)
                        <option value="{{ $id }}" {{ in_array($id, old('sub_contractors', [])) ? 'selected' : '' }}>{{ $sub_contractors }}</option>
                    @endforeach
                </select>
                @if($errors->has('sub_contractors'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_contractors') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeProject.fields.sub_contractors_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site">{{ trans('cruds.timeProject.fields.site') }}</label>
                <input class="form-control {{ $errors->has('site') ? 'is-invalid' : '' }}" type="text" name="site" id="site" value="{{ old('site', '') }}">
                @if($errors->has('site'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeProject.fields.site_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_building">{{ trans('cruds.timeProject.fields.project_building') }}</label>
                <input class="form-control {{ $errors->has('project_building') ? 'is-invalid' : '' }}" type="text" name="project_building" id="project_building" value="{{ old('project_building', '') }}">
                @if($errors->has('project_building'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_building') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeProject.fields.project_building_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_area">{{ trans('cruds.timeProject.fields.project_area') }}</label>
                <input class="form-control {{ $errors->has('project_area') ? 'is-invalid' : '' }}" type="text" name="project_area" id="project_area" value="{{ old('project_area', '') }}">
                @if($errors->has('project_area'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_area') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeProject.fields.project_area_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="work_type_id">{{ trans('cruds.timeProject.fields.work_type') }}</label>
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
                <span class="help-block">{{ trans('cruds.timeProject.fields.work_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="project_description">{{ trans('cruds.timeProject.fields.project_description') }}</label>
                <textarea class="form-control {{ $errors->has('project_description') ? 'is-invalid' : '' }}" name="project_description" id="project_description" required>{{ old('project_description') }}</textarea>
                @if($errors->has('project_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeProject.fields.project_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.timeProject.fields.start_date') }}</label>
                <input class="form-control datetime {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeProject.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_date">{{ trans('cruds.timeProject.fields.end_date') }}</label>
                <input class="form-control datetime {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeProject.fields.end_date_helper') }}</span>
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