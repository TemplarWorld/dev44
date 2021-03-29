@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.contractor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contractors.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.contractor.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contractor_contact">{{ trans('cruds.contractor.fields.contractor_contact') }}</label>
                <input class="form-control {{ $errors->has('contractor_contact') ? 'is-invalid' : '' }}" type="text" name="contractor_contact" id="contractor_contact" value="{{ old('contractor_contact', '') }}" required>
                @if($errors->has('contractor_contact'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contractor_contact') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.contractor_contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contractor_street_address">{{ trans('cruds.contractor.fields.contractor_street_address') }}</label>
                <input class="form-control {{ $errors->has('contractor_street_address') ? 'is-invalid' : '' }}" type="text" name="contractor_street_address" id="contractor_street_address" value="{{ old('contractor_street_address', '') }}" required>
                @if($errors->has('contractor_street_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contractor_street_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.contractor_street_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contractor_city">{{ trans('cruds.contractor.fields.contractor_city') }}</label>
                <input class="form-control {{ $errors->has('contractor_city') ? 'is-invalid' : '' }}" type="text" name="contractor_city" id="contractor_city" value="{{ old('contractor_city', '') }}" required>
                @if($errors->has('contractor_city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contractor_city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.contractor_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contractor_state">{{ trans('cruds.contractor.fields.contractor_state') }}</label>
                <input class="form-control {{ $errors->has('contractor_state') ? 'is-invalid' : '' }}" type="text" name="contractor_state" id="contractor_state" value="{{ old('contractor_state', '') }}" required>
                @if($errors->has('contractor_state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contractor_state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.contractor_state_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contractor_zip">{{ trans('cruds.contractor.fields.contractor_zip') }}</label>
                <input class="form-control {{ $errors->has('contractor_zip') ? 'is-invalid' : '' }}" type="text" name="contractor_zip" id="contractor_zip" value="{{ old('contractor_zip', '') }}" required>
                @if($errors->has('contractor_zip'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contractor_zip') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.contractor_zip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contractor_email">{{ trans('cruds.contractor.fields.contractor_email') }}</label>
                <input class="form-control {{ $errors->has('contractor_email') ? 'is-invalid' : '' }}" type="email" name="contractor_email" id="contractor_email" value="{{ old('contractor_email') }}">
                @if($errors->has('contractor_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contractor_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.contractor_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contractor_247_tel">{{ trans('cruds.contractor.fields.contractor_247_tel') }}</label>
                <input class="form-control {{ $errors->has('contractor_247_tel') ? 'is-invalid' : '' }}" type="text" name="contractor_247_tel" id="contractor_247_tel" value="{{ old('contractor_247_tel', '') }}" required>
                @if($errors->has('contractor_247_tel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contractor_247_tel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.contractor_247_tel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contractor_tel">{{ trans('cruds.contractor.fields.contractor_tel') }}</label>
                <input class="form-control {{ $errors->has('contractor_tel') ? 'is-invalid' : '' }}" type="text" name="contractor_tel" id="contractor_tel" value="{{ old('contractor_tel', '') }}">
                @if($errors->has('contractor_tel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contractor_tel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.contractor_tel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contractor_tel_2">{{ trans('cruds.contractor.fields.contractor_tel_2') }}</label>
                <input class="form-control {{ $errors->has('contractor_tel_2') ? 'is-invalid' : '' }}" type="text" name="contractor_tel_2" id="contractor_tel_2" value="{{ old('contractor_tel_2', '') }}">
                @if($errors->has('contractor_tel_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contractor_tel_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contractor.fields.contractor_tel_2_helper') }}</span>
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