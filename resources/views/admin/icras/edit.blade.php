@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.icra.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.icras.update", [$icra->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="project_name_id">{{ trans('cruds.icra.fields.project_name') }}</label>
                <select class="form-control select2 {{ $errors->has('project_name') ? 'is-invalid' : '' }}" name="project_name_id" id="project_name_id">
                    @foreach($project_names as $id => $project_name)
                        <option value="{{ $id }}" {{ (old('project_name_id') ? old('project_name_id') : $icra->project_name->id ?? '') == $id ? 'selected' : '' }}>{{ $project_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.project_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_number_id">{{ trans('cruds.icra.fields.project_number') }}</label>
                <select class="form-control select2 {{ $errors->has('project_number') ? 'is-invalid' : '' }}" name="project_number_id" id="project_number_id">
                    @foreach($project_numbers as $id => $project_number)
                        <option value="{{ $id }}" {{ (old('project_number_id') ? old('project_number_id') : $icra->project_number->id ?? '') == $id ? 'selected' : '' }}>{{ $project_number }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.project_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_manager_id">{{ trans('cruds.icra.fields.project_manager') }}</label>
                <select class="form-control select2 {{ $errors->has('project_manager') ? 'is-invalid' : '' }}" name="project_manager_id" id="project_manager_id">
                    @foreach($project_managers as $id => $project_manager)
                        <option value="{{ $id }}" {{ (old('project_manager_id') ? old('project_manager_id') : $icra->project_manager->id ?? '') == $id ? 'selected' : '' }}>{{ $project_manager }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_manager'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_manager') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.project_manager_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_coordinator_id">{{ trans('cruds.icra.fields.project_coordinator') }}</label>
                <select class="form-control select2 {{ $errors->has('project_coordinator') ? 'is-invalid' : '' }}" name="project_coordinator_id" id="project_coordinator_id">
                    @foreach($project_coordinators as $id => $project_coordinator)
                        <option value="{{ $id }}" {{ (old('project_coordinator_id') ? old('project_coordinator_id') : $icra->project_coordinator->id ?? '') == $id ? 'selected' : '' }}>{{ $project_coordinator }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_coordinator'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_coordinator') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.project_coordinator_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contractor_name_id">{{ trans('cruds.icra.fields.contractor_name') }}</label>
                <select class="form-control select2 {{ $errors->has('contractor_name') ? 'is-invalid' : '' }}" name="contractor_name_id" id="contractor_name_id">
                    @foreach($contractor_names as $id => $contractor_name)
                        <option value="{{ $id }}" {{ (old('contractor_name_id') ? old('contractor_name_id') : $icra->contractor_name->id ?? '') == $id ? 'selected' : '' }}>{{ $contractor_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('contractor_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contractor_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.contractor_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contractor_supervisor_id">{{ trans('cruds.icra.fields.contractor_supervisor') }}</label>
                <select class="form-control select2 {{ $errors->has('contractor_supervisor') ? 'is-invalid' : '' }}" name="contractor_supervisor_id" id="contractor_supervisor_id">
                    @foreach($contractor_supervisors as $id => $contractor_supervisor)
                        <option value="{{ $id }}" {{ (old('contractor_supervisor_id') ? old('contractor_supervisor_id') : $icra->contractor_supervisor->id ?? '') == $id ? 'selected' : '' }}>{{ $contractor_supervisor }}</option>
                    @endforeach
                </select>
                @if($errors->has('contractor_supervisor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contractor_supervisor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.contractor_supervisor_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_supervisor_tel_id">{{ trans('cruds.icra.fields.site_supervisor_tel') }}</label>
                <select class="form-control select2 {{ $errors->has('site_supervisor_tel') ? 'is-invalid' : '' }}" name="site_supervisor_tel_id" id="site_supervisor_tel_id">
                    @foreach($site_supervisor_tels as $id => $site_supervisor_tel)
                        <option value="{{ $id }}" {{ (old('site_supervisor_tel_id') ? old('site_supervisor_tel_id') : $icra->site_supervisor_tel->id ?? '') == $id ? 'selected' : '' }}>{{ $site_supervisor_tel }}</option>
                    @endforeach
                </select>
                @if($errors->has('site_supervisor_tel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_supervisor_tel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.site_supervisor_tel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_site_id">{{ trans('cruds.icra.fields.project_site') }}</label>
                <select class="form-control select2 {{ $errors->has('project_site') ? 'is-invalid' : '' }}" name="project_site_id" id="project_site_id">
                    @foreach($project_sites as $id => $project_site)
                        <option value="{{ $id }}" {{ (old('project_site_id') ? old('project_site_id') : $icra->project_site->id ?? '') == $id ? 'selected' : '' }}>{{ $project_site }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_site'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_site') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.project_site_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_building_id">{{ trans('cruds.icra.fields.project_building') }}</label>
                <select class="form-control select2 {{ $errors->has('project_building') ? 'is-invalid' : '' }}" name="project_building_id" id="project_building_id">
                    @foreach($project_buildings as $id => $project_building)
                        <option value="{{ $id }}" {{ (old('project_building_id') ? old('project_building_id') : $icra->project_building->id ?? '') == $id ? 'selected' : '' }}>{{ $project_building }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_building'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_building') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.project_building_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_area_id">{{ trans('cruds.icra.fields.project_area') }}</label>
                <select class="form-control select2 {{ $errors->has('project_area') ? 'is-invalid' : '' }}" name="project_area_id" id="project_area_id">
                    @foreach($project_areas as $id => $project_area)
                        <option value="{{ $id }}" {{ (old('project_area_id') ? old('project_area_id') : $icra->project_area->id ?? '') == $id ? 'selected' : '' }}>{{ $project_area }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_area'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_area') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.project_area_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="work_type_id">{{ trans('cruds.icra.fields.work_type') }}</label>
                <select class="form-control select2 {{ $errors->has('work_type') ? 'is-invalid' : '' }}" name="work_type_id" id="work_type_id">
                    @foreach($work_types as $id => $work_type)
                        <option value="{{ $id }}" {{ (old('work_type_id') ? old('work_type_id') : $icra->work_type->id ?? '') == $id ? 'selected' : '' }}>{{ $work_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('work_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('work_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.work_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_description_id">{{ trans('cruds.icra.fields.project_description') }}</label>
                <select class="form-control select2 {{ $errors->has('project_description') ? 'is-invalid' : '' }}" name="project_description_id" id="project_description_id">
                    @foreach($project_descriptions as $id => $project_description)
                        <option value="{{ $id }}" {{ (old('project_description_id') ? old('project_description_id') : $icra->project_description->id ?? '') == $id ? 'selected' : '' }}>{{ $project_description }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.project_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="icra_program">{{ trans('cruds.icra.fields.icra_program') }}</label>
                <input class="form-control {{ $errors->has('icra_program') ? 'is-invalid' : '' }}" type="text" name="icra_program" id="icra_program" value="{{ old('icra_program', $icra->icra_program) }}">
                @if($errors->has('icra_program'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_program') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_program_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.icra.fields.start_date') }}</label>
                <input class="form-control datetime {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $icra->start_date) }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_date">{{ trans('cruds.icra.fields.end_date') }}</label>
                <input class="form-control datetime {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $icra->end_date) }}" required>
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('type_a') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="type_a" value="0">
                    <input class="form-check-input" type="checkbox" name="type_a" id="type_a" value="1" {{ $icra->type_a || old('type_a', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="type_a">{{ trans('cruds.icra.fields.type_a') }}</label>
                </div>
                @if($errors->has('type_a'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type_a') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.type_a_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('type_b') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="type_b" value="0">
                    <input class="form-check-input" type="checkbox" name="type_b" id="type_b" value="1" {{ $icra->type_b || old('type_b', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="type_b">{{ trans('cruds.icra.fields.type_b') }}</label>
                </div>
                @if($errors->has('type_b'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type_b') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.type_b_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('type_c') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="type_c" value="0">
                    <input class="form-check-input" type="checkbox" name="type_c" id="type_c" value="1" {{ $icra->type_c || old('type_c', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="type_c">{{ trans('cruds.icra.fields.type_c') }}</label>
                </div>
                @if($errors->has('type_c'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type_c') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.type_c_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('type_d') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="type_d" value="0">
                    <input class="form-check-input" type="checkbox" name="type_d" id="type_d" value="1" {{ $icra->type_d || old('type_d', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="type_d">{{ trans('cruds.icra.fields.type_d') }}</label>
                </div>
                @if($errors->has('type_d'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type_d') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.type_d_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('group_1') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="group_1" value="0">
                    <input class="form-check-input" type="checkbox" name="group_1" id="group_1" value="1" {{ $icra->group_1 || old('group_1', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="group_1">{{ trans('cruds.icra.fields.group_1') }}</label>
                </div>
                @if($errors->has('group_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('group_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.group_1_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('group_2') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="group_2" value="0">
                    <input class="form-check-input" type="checkbox" name="group_2" id="group_2" value="1" {{ $icra->group_2 || old('group_2', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="group_2">{{ trans('cruds.icra.fields.group_2') }}</label>
                </div>
                @if($errors->has('group_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('group_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.group_2_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('group_3') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="group_3" value="0">
                    <input class="form-check-input" type="checkbox" name="group_3" id="group_3" value="1" {{ $icra->group_3 || old('group_3', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="group_3">{{ trans('cruds.icra.fields.group_3') }}</label>
                </div>
                @if($errors->has('group_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('group_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.group_3_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('group_4') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="group_4" value="0">
                    <input class="form-check-input" type="checkbox" name="group_4" id="group_4" value="1" {{ $icra->group_4 || old('group_4', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="group_4">{{ trans('cruds.icra.fields.group_4') }}</label>
                </div>
                @if($errors->has('group_4'))
                    <div class="invalid-feedback">
                        {{ $errors->first('group_4') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.group_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.icra.fields.icra_pmd') }}</label>
                <select class="form-control {{ $errors->has('icra_pmd') ? 'is-invalid' : '' }}" name="icra_pmd" id="icra_pmd">
                    <option value disabled {{ old('icra_pmd', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Icra::ICRA_PMD_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('icra_pmd', $icra->icra_pmd) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('icra_pmd'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_pmd') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_pmd_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.icra.fields.icra_areas_impact_side_a') }}</label>
                <select class="form-control {{ $errors->has('icra_areas_impact_side_a') ? 'is-invalid' : '' }}" name="icra_areas_impact_side_a" id="icra_areas_impact_side_a">
                    <option value disabled {{ old('icra_areas_impact_side_a', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Icra::ICRA_AREAS_IMPACT_SIDE_A_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('icra_areas_impact_side_a', $icra->icra_areas_impact_side_a) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('icra_areas_impact_side_a'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_areas_impact_side_a') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_areas_impact_side_a_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.icra.fields.icra_areas_impact_side_b') }}</label>
                <select class="form-control {{ $errors->has('icra_areas_impact_side_b') ? 'is-invalid' : '' }}" name="icra_areas_impact_side_b" id="icra_areas_impact_side_b">
                    <option value disabled {{ old('icra_areas_impact_side_b', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Icra::ICRA_AREAS_IMPACT_SIDE_B_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('icra_areas_impact_side_b', $icra->icra_areas_impact_side_b) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('icra_areas_impact_side_b'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_areas_impact_side_b') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_areas_impact_side_b_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.icra.fields.icra_areas_impact_side_c') }}</label>
                <select class="form-control {{ $errors->has('icra_areas_impact_side_c') ? 'is-invalid' : '' }}" name="icra_areas_impact_side_c" id="icra_areas_impact_side_c">
                    <option value disabled {{ old('icra_areas_impact_side_c', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Icra::ICRA_AREAS_IMPACT_SIDE_C_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('icra_areas_impact_side_c', $icra->icra_areas_impact_side_c) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('icra_areas_impact_side_c'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_areas_impact_side_c') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_areas_impact_side_c_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.icra.fields.icra_areas_impact_side_d') }}</label>
                <select class="form-control {{ $errors->has('icra_areas_impact_side_d') ? 'is-invalid' : '' }}" name="icra_areas_impact_side_d" id="icra_areas_impact_side_d">
                    <option value disabled {{ old('icra_areas_impact_side_d', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Icra::ICRA_AREAS_IMPACT_SIDE_D_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('icra_areas_impact_side_d', $icra->icra_areas_impact_side_d) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('icra_areas_impact_side_d'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_areas_impact_side_d') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_areas_impact_side_d_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="icra_notes">{{ trans('cruds.icra.fields.icra_notes') }}</label>
                <textarea class="form-control {{ $errors->has('icra_notes') ? 'is-invalid' : '' }}" name="icra_notes" id="icra_notes">{{ old('icra_notes', $icra->icra_notes) }}</textarea>
                @if($errors->has('icra_notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.icra.fields.icra_hoarding_type') }}</label>
                <select class="form-control {{ $errors->has('icra_hoarding_type') ? 'is-invalid' : '' }}" name="icra_hoarding_type" id="icra_hoarding_type">
                    <option value disabled {{ old('icra_hoarding_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Icra::ICRA_HOARDING_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('icra_hoarding_type', $icra->icra_hoarding_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('icra_hoarding_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_hoarding_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_hoarding_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="icra_ante_pressure">{{ trans('cruds.icra.fields.icra_ante_pressure') }}</label>
                <input class="form-control {{ $errors->has('icra_ante_pressure') ? 'is-invalid' : '' }}" type="text" name="icra_ante_pressure" id="icra_ante_pressure" value="{{ old('icra_ante_pressure', $icra->icra_ante_pressure) }}">
                @if($errors->has('icra_ante_pressure'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_ante_pressure') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_ante_pressure_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="icra_const_area_pressure">{{ trans('cruds.icra.fields.icra_const_area_pressure') }}</label>
                <input class="form-control {{ $errors->has('icra_const_area_pressure') ? 'is-invalid' : '' }}" type="text" name="icra_const_area_pressure" id="icra_const_area_pressure" value="{{ old('icra_const_area_pressure', $icra->icra_const_area_pressure) }}">
                @if($errors->has('icra_const_area_pressure'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_const_area_pressure') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_const_area_pressure_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.icra.fields.icra_hepa_unit') }}</label>
                <select class="form-control {{ $errors->has('icra_hepa_unit') ? 'is-invalid' : '' }}" name="icra_hepa_unit" id="icra_hepa_unit">
                    <option value disabled {{ old('icra_hepa_unit', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Icra::ICRA_HEPA_UNIT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('icra_hepa_unit', $icra->icra_hepa_unit) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('icra_hepa_unit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_hepa_unit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_hepa_unit_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.icra.fields.icra_exhaust') }}</label>
                <select class="form-control {{ $errors->has('icra_exhaust') ? 'is-invalid' : '' }}" name="icra_exhaust" id="icra_exhaust">
                    <option value disabled {{ old('icra_exhaust', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Icra::ICRA_EXHAUST_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('icra_exhaust', $icra->icra_exhaust) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('icra_exhaust'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_exhaust') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_exhaust_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('icra_pressure_mon') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="icra_pressure_mon" value="0">
                    <input class="form-check-input" type="checkbox" name="icra_pressure_mon" id="icra_pressure_mon" value="1" {{ $icra->icra_pressure_mon || old('icra_pressure_mon', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="icra_pressure_mon">{{ trans('cruds.icra.fields.icra_pressure_mon') }}</label>
                </div>
                @if($errors->has('icra_pressure_mon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_pressure_mon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_pressure_mon_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="icra_additional">{{ trans('cruds.icra.fields.icra_additional') }}</label>
                <textarea class="form-control {{ $errors->has('icra_additional') ? 'is-invalid' : '' }}" name="icra_additional" id="icra_additional">{{ old('icra_additional', $icra->icra_additional) }}</textarea>
                @if($errors->has('icra_additional'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_additional') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_additional_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="icra_requested_by">{{ trans('cruds.icra.fields.icra_requested_by') }}</label>
                <input class="form-control {{ $errors->has('icra_requested_by') ? 'is-invalid' : '' }}" type="text" name="icra_requested_by" id="icra_requested_by" value="{{ old('icra_requested_by', $icra->icra_requested_by) }}">
                @if($errors->has('icra_requested_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_requested_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_requested_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="icra_approved_by_1_id">{{ trans('cruds.icra.fields.icra_approved_by_1') }}</label>
                <select class="form-control select2 {{ $errors->has('icra_approved_by_1') ? 'is-invalid' : '' }}" name="icra_approved_by_1_id" id="icra_approved_by_1_id">
                    @foreach($icra_approved_by_1s as $id => $icra_approved_by_1)
                        <option value="{{ $id }}" {{ (old('icra_approved_by_1_id') ? old('icra_approved_by_1_id') : $icra->icra_approved_by_1->id ?? '') == $id ? 'selected' : '' }}>{{ $icra_approved_by_1 }}</option>
                    @endforeach
                </select>
                @if($errors->has('icra_approved_by_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_approved_by_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_approved_by_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="icra_approved_by_2_id">{{ trans('cruds.icra.fields.icra_approved_by_2') }}</label>
                <select class="form-control select2 {{ $errors->has('icra_approved_by_2') ? 'is-invalid' : '' }}" name="icra_approved_by_2_id" id="icra_approved_by_2_id">
                    @foreach($icra_approved_by_2s as $id => $icra_approved_by_2)
                        <option value="{{ $id }}" {{ (old('icra_approved_by_2_id') ? old('icra_approved_by_2_id') : $icra->icra_approved_by_2->id ?? '') == $id ? 'selected' : '' }}>{{ $icra_approved_by_2 }}</option>
                    @endforeach
                </select>
                @if($errors->has('icra_approved_by_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_approved_by_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_approved_by_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="icra_approved_by_3_id">{{ trans('cruds.icra.fields.icra_approved_by_3') }}</label>
                <select class="form-control select2 {{ $errors->has('icra_approved_by_3') ? 'is-invalid' : '' }}" name="icra_approved_by_3_id" id="icra_approved_by_3_id">
                    @foreach($icra_approved_by_3s as $id => $icra_approved_by_3)
                        <option value="{{ $id }}" {{ (old('icra_approved_by_3_id') ? old('icra_approved_by_3_id') : $icra->icra_approved_by_3->id ?? '') == $id ? 'selected' : '' }}>{{ $icra_approved_by_3 }}</option>
                    @endforeach
                </select>
                @if($errors->has('icra_approved_by_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_approved_by_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_approved_by_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="icra_approved_by_4_id">{{ trans('cruds.icra.fields.icra_approved_by_4') }}</label>
                <select class="form-control select2 {{ $errors->has('icra_approved_by_4') ? 'is-invalid' : '' }}" name="icra_approved_by_4_id" id="icra_approved_by_4_id">
                    @foreach($icra_approved_by_4s as $id => $icra_approved_by_4)
                        <option value="{{ $id }}" {{ (old('icra_approved_by_4_id') ? old('icra_approved_by_4_id') : $icra->icra_approved_by_4->id ?? '') == $id ? 'selected' : '' }}>{{ $icra_approved_by_4 }}</option>
                    @endforeach
                </select>
                @if($errors->has('icra_approved_by_4'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_approved_by_4') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_approved_by_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="icra_approval_date">{{ trans('cruds.icra.fields.icra_approval_date') }}</label>
                <input class="form-control datetime {{ $errors->has('icra_approval_date') ? 'is-invalid' : '' }}" type="text" name="icra_approval_date" id="icra_approval_date" value="{{ old('icra_approval_date', $icra->icra_approval_date) }}" required>
                @if($errors->has('icra_approval_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_approval_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icra.fields.icra_approval_date_helper') }}</span>
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