@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.drawingRequest.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.drawing-requests.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tracking_number">{{ trans('cruds.drawingRequest.fields.tracking_number') }}</label>
                <input class="form-control {{ $errors->has('tracking_number') ? 'is-invalid' : '' }}" type="text" name="tracking_number" id="tracking_number" value="{{ old('tracking_number', '') }}">
                @if($errors->has('tracking_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tracking_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.tracking_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dr_approval_id">{{ trans('cruds.drawingRequest.fields.dr_approval') }}</label>
                <select class="form-control select2 {{ $errors->has('dr_approval') ? 'is-invalid' : '' }}" name="dr_approval_id" id="dr_approval_id">
                    @foreach($dr_approvals as $id => $dr_approval)
                        <option value="{{ $id }}" {{ old('dr_approval_id') == $id ? 'selected' : '' }}>{{ $dr_approval }}</option>
                    @endforeach
                </select>
                @if($errors->has('dr_approval'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dr_approval') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.dr_approval_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dr_requested_by">{{ trans('cruds.drawingRequest.fields.dr_requested_by') }}</label>
                <input class="form-control {{ $errors->has('dr_requested_by') ? 'is-invalid' : '' }}" type="text" name="dr_requested_by" id="dr_requested_by" value="{{ old('dr_requested_by', '') }}" required>
                @if($errors->has('dr_requested_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dr_requested_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.dr_requested_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_required">{{ trans('cruds.drawingRequest.fields.date_required') }}</label>
                <input class="form-control datetime {{ $errors->has('date_required') ? 'is-invalid' : '' }}" type="text" name="date_required" id="date_required" value="{{ old('date_required') }}" required>
                @if($errors->has('date_required'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_required') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.date_required_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_name_id">{{ trans('cruds.drawingRequest.fields.project_name') }}</label>
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
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.project_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_manager_id">{{ trans('cruds.drawingRequest.fields.project_manager') }}</label>
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
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.project_manager_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_coordinator_id">{{ trans('cruds.drawingRequest.fields.project_coordinator') }}</label>
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
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.project_coordinator_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="project_description">{{ trans('cruds.drawingRequest.fields.project_description') }}</label>
                <textarea class="form-control {{ $errors->has('project_description') ? 'is-invalid' : '' }}" name="project_description" id="project_description" required>{{ old('project_description') }}</textarea>
                @if($errors->has('project_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.project_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_group_id">{{ trans('cruds.drawingRequest.fields.project_group') }}</label>
                <select class="form-control select2 {{ $errors->has('project_group') ? 'is-invalid' : '' }}" name="project_group_id" id="project_group_id">
                    @foreach($project_groups as $id => $project_group)
                        <option value="{{ $id }}" {{ old('project_group_id') == $id ? 'selected' : '' }}>{{ $project_group }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_group'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_group') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.project_group_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="project_building_id">{{ trans('cruds.drawingRequest.fields.project_building') }}</label>
                <select class="form-control select2 {{ $errors->has('project_building') ? 'is-invalid' : '' }}" name="project_building_id" id="project_building_id" required>
                    @foreach($project_buildings as $id => $project_building)
                        <option value="{{ $id }}" {{ old('project_building_id') == $id ? 'selected' : '' }}>{{ $project_building }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_building'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_building') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.project_building_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_area_id">{{ trans('cruds.drawingRequest.fields.project_area') }}</label>
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
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.project_area_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.drawingRequest.fields.dr_1_discipline') }}</label>
                <select class="form-control {{ $errors->has('dr_1_discipline') ? 'is-invalid' : '' }}" name="dr_1_discipline" id="dr_1_discipline">
                    <option value disabled {{ old('dr_1_discipline', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\DrawingRequest::DR_1_DISCIPLINE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('dr_1_discipline', '- Select Discipline -') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('dr_1_discipline'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dr_1_discipline') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.dr_1_discipline_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.drawingRequest.fields.dr_1_type') }}</label>
                <select class="form-control {{ $errors->has('dr_1_type') ? 'is-invalid' : '' }}" name="dr_1_type" id="dr_1_type">
                    <option value disabled {{ old('dr_1_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\DrawingRequest::DR_1_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('dr_1_type', '- select -') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('dr_1_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dr_1_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.dr_1_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dr_1_type_description">{{ trans('cruds.drawingRequest.fields.dr_1_type_description') }}</label>
                <input class="form-control {{ $errors->has('dr_1_type_description') ? 'is-invalid' : '' }}" type="text" name="dr_1_type_description" id="dr_1_type_description" value="{{ old('dr_1_type_description', '') }}">
                @if($errors->has('dr_1_type_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dr_1_type_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.dr_1_type_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_building_2">{{ trans('cruds.drawingRequest.fields.project_building_2') }}</label>
                <input class="form-control {{ $errors->has('project_building_2') ? 'is-invalid' : '' }}" type="text" name="project_building_2" id="project_building_2" value="{{ old('project_building_2', '') }}">
                @if($errors->has('project_building_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_building_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.project_building_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_area_2">{{ trans('cruds.drawingRequest.fields.project_area_2') }}</label>
                <input class="form-control {{ $errors->has('project_area_2') ? 'is-invalid' : '' }}" type="text" name="project_area_2" id="project_area_2" value="{{ old('project_area_2', '') }}">
                @if($errors->has('project_area_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_area_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.project_area_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.drawingRequest.fields.dr_2_discipline') }}</label>
                <select class="form-control {{ $errors->has('dr_2_discipline') ? 'is-invalid' : '' }}" name="dr_2_discipline" id="dr_2_discipline">
                    <option value disabled {{ old('dr_2_discipline', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\DrawingRequest::DR_2_DISCIPLINE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('dr_2_discipline', '- Select Discipline -') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('dr_2_discipline'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dr_2_discipline') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.dr_2_discipline_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.drawingRequest.fields.dr_2_type') }}</label>
                <select class="form-control {{ $errors->has('dr_2_type') ? 'is-invalid' : '' }}" name="dr_2_type" id="dr_2_type">
                    <option value disabled {{ old('dr_2_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\DrawingRequest::DR_2_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('dr_2_type', '- Select -') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('dr_2_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dr_2_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.dr_2_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dr_2_type_description">{{ trans('cruds.drawingRequest.fields.dr_2_type_description') }}</label>
                <input class="form-control {{ $errors->has('dr_2_type_description') ? 'is-invalid' : '' }}" type="text" name="dr_2_type_description" id="dr_2_type_description" value="{{ old('dr_2_type_description', '') }}">
                @if($errors->has('dr_2_type_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dr_2_type_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.dr_2_type_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_building_3">{{ trans('cruds.drawingRequest.fields.project_building_3') }}</label>
                <input class="form-control {{ $errors->has('project_building_3') ? 'is-invalid' : '' }}" type="text" name="project_building_3" id="project_building_3" value="{{ old('project_building_3', '') }}">
                @if($errors->has('project_building_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_building_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.project_building_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_area_3">{{ trans('cruds.drawingRequest.fields.project_area_3') }}</label>
                <input class="form-control {{ $errors->has('project_area_3') ? 'is-invalid' : '' }}" type="text" name="project_area_3" id="project_area_3" value="{{ old('project_area_3', '') }}">
                @if($errors->has('project_area_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_area_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.project_area_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dr_3_type">{{ trans('cruds.drawingRequest.fields.dr_3_type') }}</label>
                <input class="form-control {{ $errors->has('dr_3_type') ? 'is-invalid' : '' }}" type="text" name="dr_3_type" id="dr_3_type" value="{{ old('dr_3_type', '') }}">
                @if($errors->has('dr_3_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dr_3_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.dr_3_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.drawingRequest.fields.dr_1_civil') }}</label>
                <select class="form-control {{ $errors->has('dr_1_civil') ? 'is-invalid' : '' }}" name="dr_1_civil" id="dr_1_civil">
                    <option value disabled {{ old('dr_1_civil', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\DrawingRequest::DR_1_CIVIL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('dr_1_civil', '- select -') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('dr_1_civil'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dr_1_civil') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.dr_1_civil_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.drawingRequest.fields.dr_2_civil') }}</label>
                <select class="form-control {{ $errors->has('dr_2_civil') ? 'is-invalid' : '' }}" name="dr_2_civil" id="dr_2_civil">
                    <option value disabled {{ old('dr_2_civil', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\DrawingRequest::DR_2_CIVIL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('dr_2_civil', '- select -') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('dr_2_civil'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dr_2_civil') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.dr_2_civil_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="civil_other">{{ trans('cruds.drawingRequest.fields.civil_other') }}</label>
                <input class="form-control {{ $errors->has('civil_other') ? 'is-invalid' : '' }}" type="text" name="civil_other" id="civil_other" value="{{ old('civil_other', '') }}">
                @if($errors->has('civil_other'))
                    <div class="invalid-feedback">
                        {{ $errors->first('civil_other') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.civil_other_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="civil_descrip">{{ trans('cruds.drawingRequest.fields.civil_descrip') }}</label>
                <input class="form-control {{ $errors->has('civil_descrip') ? 'is-invalid' : '' }}" type="text" name="civil_descrip" id="civil_descrip" value="{{ old('civil_descrip', '') }}">
                @if($errors->has('civil_descrip'))
                    <div class="invalid-feedback">
                        {{ $errors->first('civil_descrip') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.civil_descrip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="drawing_number_title">{{ trans('cruds.drawingRequest.fields.drawing_number_title') }}</label>
                <textarea class="form-control {{ $errors->has('drawing_number_title') ? 'is-invalid' : '' }}" name="drawing_number_title" id="drawing_number_title">{{ old('drawing_number_title') }}</textarea>
                @if($errors->has('drawing_number_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('drawing_number_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.drawingRequest.fields.drawing_number_title_helper') }}</span>
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