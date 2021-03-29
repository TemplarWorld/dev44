@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.commissioning.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.commissionings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="comm_1_worko">{{ trans('cruds.commissioning.fields.comm_1_worko') }}</label>
                <input class="form-control {{ $errors->has('comm_1_worko') ? 'is-invalid' : '' }}" type="text" name="comm_1_worko" id="comm_1_worko" value="{{ old('comm_1_worko', '') }}">
                @if($errors->has('comm_1_worko'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comm_1_worko') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissioning.fields.comm_1_worko_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_name_id">{{ trans('cruds.commissioning.fields.project_name') }}</label>
                <select class="form-control select2 {{ $errors->has('project_name') ? 'is-invalid' : '' }}" name="project_name_id" id="project_name_id">
                    @foreach($project_names as $id => $project_name)
                        <option value="{{ $id }}" {{ old('project_name_id') == $id ? 'selected' : '' }}>{{ $project_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissioning.fields.project_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="project_manager_id">{{ trans('cruds.commissioning.fields.project_manager') }}</label>
                <select class="form-control select2 {{ $errors->has('project_manager') ? 'is-invalid' : '' }}" name="project_manager_id" id="project_manager_id" required>
                    @foreach($project_managers as $id => $project_manager)
                        <option value="{{ $id }}" {{ old('project_manager_id') == $id ? 'selected' : '' }}>{{ $project_manager }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_manager'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_manager') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissioning.fields.project_manager_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_coordinator_id">{{ trans('cruds.commissioning.fields.project_coordinator') }}</label>
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
                <span class="help-block">{{ trans('cruds.commissioning.fields.project_coordinator_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_number_id">{{ trans('cruds.commissioning.fields.project_number') }}</label>
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
                <span class="help-block">{{ trans('cruds.commissioning.fields.project_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comm_system_1">{{ trans('cruds.commissioning.fields.comm_system_1') }}</label>
                <input class="form-control {{ $errors->has('comm_system_1') ? 'is-invalid' : '' }}" type="text" name="comm_system_1" id="comm_system_1" value="{{ old('comm_system_1', '') }}">
                @if($errors->has('comm_system_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comm_system_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissioning.fields.comm_system_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comm_location_1">{{ trans('cruds.commissioning.fields.comm_location_1') }}</label>
                <input class="form-control {{ $errors->has('comm_location_1') ? 'is-invalid' : '' }}" type="text" name="comm_location_1" id="comm_location_1" value="{{ old('comm_location_1', '') }}">
                @if($errors->has('comm_location_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comm_location_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissioning.fields.comm_location_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comm_description_1">{{ trans('cruds.commissioning.fields.comm_description_1') }}</label>
                <input class="form-control {{ $errors->has('comm_description_1') ? 'is-invalid' : '' }}" type="text" name="comm_description_1" id="comm_description_1" value="{{ old('comm_description_1', '') }}">
                @if($errors->has('comm_description_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comm_description_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissioning.fields.comm_description_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comm_datestart_1">{{ trans('cruds.commissioning.fields.comm_datestart_1') }}</label>
                <input class="form-control date {{ $errors->has('comm_datestart_1') ? 'is-invalid' : '' }}" type="text" name="comm_datestart_1" id="comm_datestart_1" value="{{ old('comm_datestart_1') }}">
                @if($errors->has('comm_datestart_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comm_datestart_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissioning.fields.comm_datestart_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comm_enddate_1">{{ trans('cruds.commissioning.fields.comm_enddate_1') }}</label>
                <input class="form-control date {{ $errors->has('comm_enddate_1') ? 'is-invalid' : '' }}" type="text" name="comm_enddate_1" id="comm_enddate_1" value="{{ old('comm_enddate_1') }}">
                @if($errors->has('comm_enddate_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comm_enddate_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissioning.fields.comm_enddate_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comm_starttime_1">{{ trans('cruds.commissioning.fields.comm_starttime_1') }}</label>
                <input class="form-control timepicker {{ $errors->has('comm_starttime_1') ? 'is-invalid' : '' }}" type="text" name="comm_starttime_1" id="comm_starttime_1" value="{{ old('comm_starttime_1') }}">
                @if($errors->has('comm_starttime_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comm_starttime_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissioning.fields.comm_starttime_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comm_endtime">{{ trans('cruds.commissioning.fields.comm_endtime') }}</label>
                <input class="form-control timepicker {{ $errors->has('comm_endtime') ? 'is-invalid' : '' }}" type="text" name="comm_endtime" id="comm_endtime" value="{{ old('comm_endtime') }}">
                @if($errors->has('comm_endtime'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comm_endtime') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commissioning.fields.comm_endtime_helper') }}</span>
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