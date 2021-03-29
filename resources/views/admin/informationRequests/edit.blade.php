@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.informationRequest.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.information-requests.update", [$informationRequest->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="requested_by">{{ trans('cruds.informationRequest.fields.requested_by') }}</label>
                <input class="form-control {{ $errors->has('requested_by') ? 'is-invalid' : '' }}" type="text" name="requested_by" id="requested_by" value="{{ old('requested_by', $informationRequest->requested_by) }}" required>
                @if($errors->has('requested_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('requested_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.informationRequest.fields.requested_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="info_tel">{{ trans('cruds.informationRequest.fields.info_tel') }}</label>
                <input class="form-control {{ $errors->has('info_tel') ? 'is-invalid' : '' }}" type="text" name="info_tel" id="info_tel" value="{{ old('info_tel', $informationRequest->info_tel) }}">
                @if($errors->has('info_tel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('info_tel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.informationRequest.fields.info_tel_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="req_email">{{ trans('cruds.informationRequest.fields.req_email') }}</label>
                <input class="form-control {{ $errors->has('req_email') ? 'is-invalid' : '' }}" type="email" name="req_email" id="req_email" value="{{ old('req_email', $informationRequest->req_email) }}" required>
                @if($errors->has('req_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('req_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.informationRequest.fields.req_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="project_name">{{ trans('cruds.informationRequest.fields.project_name') }}</label>
                <input class="form-control {{ $errors->has('project_name') ? 'is-invalid' : '' }}" type="text" name="project_name" id="project_name" value="{{ old('project_name', $informationRequest->project_name) }}" required>
                @if($errors->has('project_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.informationRequest.fields.project_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_manager_id">{{ trans('cruds.informationRequest.fields.project_manager') }}</label>
                <select class="form-control select2 {{ $errors->has('project_manager') ? 'is-invalid' : '' }}" name="project_manager_id" id="project_manager_id">
                    @foreach($project_managers as $id => $project_manager)
                        <option value="{{ $id }}" {{ (old('project_manager_id') ? old('project_manager_id') : $informationRequest->project_manager->id ?? '') == $id ? 'selected' : '' }}>{{ $project_manager }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_manager'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project_manager') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.informationRequest.fields.project_manager_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="info_date_req">{{ trans('cruds.informationRequest.fields.info_date_req') }}</label>
                <input class="form-control datetime {{ $errors->has('info_date_req') ? 'is-invalid' : '' }}" type="text" name="info_date_req" id="info_date_req" value="{{ old('info_date_req', $informationRequest->info_date_req) }}" required>
                @if($errors->has('info_date_req'))
                    <div class="invalid-feedback">
                        {{ $errors->first('info_date_req') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.informationRequest.fields.info_date_req_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="info_descrip">{{ trans('cruds.informationRequest.fields.info_descrip') }}</label>
                <textarea class="form-control {{ $errors->has('info_descrip') ? 'is-invalid' : '' }}" name="info_descrip" id="info_descrip" required>{{ old('info_descrip', $informationRequest->info_descrip) }}</textarea>
                @if($errors->has('info_descrip'))
                    <div class="invalid-feedback">
                        {{ $errors->first('info_descrip') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.informationRequest.fields.info_descrip_helper') }}</span>
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