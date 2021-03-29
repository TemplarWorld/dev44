@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.icraApproval.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.icra-approvals.update", [$icraApproval->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.icraApproval.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $icraApproval->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icraApproval.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.icraApproval.fields.icra_app_dept') }}</label>
                <select class="form-control {{ $errors->has('icra_app_dept') ? 'is-invalid' : '' }}" name="icra_app_dept" id="icra_app_dept">
                    <option value disabled {{ old('icra_app_dept', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\IcraApproval::ICRA_APP_DEPT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('icra_app_dept', $icraApproval->icra_app_dept) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('icra_app_dept'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icra_app_dept') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.icraApproval.fields.icra_app_dept_helper') }}</span>
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