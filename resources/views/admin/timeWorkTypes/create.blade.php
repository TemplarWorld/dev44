@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.timeWorkType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.time-work-types.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.timeWorkType.fields.name') }}</label>
                <select class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name">
                    <option value disabled {{ old('name', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\TimeWorkType::NAME_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('name', '- select -') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeWorkType.fields.name_helper') }}</span>
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