@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.approval.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.approvals.update", [$approval->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="permit_approval_name">{{ trans('cruds.approval.fields.permit_approval_name') }}</label>
                <input class="form-control {{ $errors->has('permit_approval_name') ? 'is-invalid' : '' }}" type="text" name="permit_approval_name" id="permit_approval_name" value="{{ old('permit_approval_name', $approval->permit_approval_name) }}">
                @if($errors->has('permit_approval_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permit_approval_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approval.fields.permit_approval_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.approval.fields.permit_approval_department') }}</label>
                <select class="form-control {{ $errors->has('permit_approval_department') ? 'is-invalid' : '' }}" name="permit_approval_department" id="permit_approval_department">
                    <option value disabled {{ old('permit_approval_department', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Approval::PERMIT_APPROVAL_DEPARTMENT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('permit_approval_department', $approval->permit_approval_department) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('permit_approval_department'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permit_approval_department') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approval.fields.permit_approval_department_helper') }}</span>
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