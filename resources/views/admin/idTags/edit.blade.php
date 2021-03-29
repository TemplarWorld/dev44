@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.idTag.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.id-tags.update", [$idTag->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.idTag.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $idTag->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.idTag.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.idTag.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $idTag->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.idTag.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ic_tel">{{ trans('cruds.idTag.fields.ic_tel') }}</label>
                <input class="form-control {{ $errors->has('ic_tel') ? 'is-invalid' : '' }}" type="text" name="ic_tel" id="ic_tel" value="{{ old('ic_tel', $idTag->ic_tel) }}" required>
                @if($errors->has('ic_tel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ic_tel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.idTag.fields.ic_tel_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contractor_company_id">{{ trans('cruds.idTag.fields.contractor_company') }}</label>
                <select class="form-control select2 {{ $errors->has('contractor_company') ? 'is-invalid' : '' }}" name="contractor_company_id" id="contractor_company_id" required>
                    @foreach($contractor_companies as $id => $contractor_company)
                        <option value="{{ $id }}" {{ (old('contractor_company_id') ? old('contractor_company_id') : $idTag->contractor_company->id ?? '') == $id ? 'selected' : '' }}>{{ $contractor_company }}</option>
                    @endforeach
                </select>
                @if($errors->has('contractor_company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contractor_company') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.idTag.fields.contractor_company_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="idtag_em_contact">{{ trans('cruds.idTag.fields.idtag_em_contact') }}</label>
                <input class="form-control {{ $errors->has('idtag_em_contact') ? 'is-invalid' : '' }}" type="text" name="idtag_em_contact" id="idtag_em_contact" value="{{ old('idtag_em_contact', $idTag->idtag_em_contact) }}" required>
                @if($errors->has('idtag_em_contact'))
                    <div class="invalid-feedback">
                        {{ $errors->first('idtag_em_contact') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.idTag.fields.idtag_em_contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="idtag_em_contact_tel">{{ trans('cruds.idTag.fields.idtag_em_contact_tel') }}</label>
                <input class="form-control {{ $errors->has('idtag_em_contact_tel') ? 'is-invalid' : '' }}" type="text" name="idtag_em_contact_tel" id="idtag_em_contact_tel" value="{{ old('idtag_em_contact_tel', $idTag->idtag_em_contact_tel) }}" required>
                @if($errors->has('idtag_em_contact_tel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('idtag_em_contact_tel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.idTag.fields.idtag_em_contact_tel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="idtag_address">{{ trans('cruds.idTag.fields.idtag_address') }}</label>
                <input class="form-control {{ $errors->has('idtag_address') ? 'is-invalid' : '' }}" type="text" name="idtag_address" id="idtag_address" value="{{ old('idtag_address', $idTag->idtag_address) }}">
                @if($errors->has('idtag_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('idtag_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.idTag.fields.idtag_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="idtag_city">{{ trans('cruds.idTag.fields.idtag_city') }}</label>
                <input class="form-control {{ $errors->has('idtag_city') ? 'is-invalid' : '' }}" type="text" name="idtag_city" id="idtag_city" value="{{ old('idtag_city', $idTag->idtag_city) }}">
                @if($errors->has('idtag_city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('idtag_city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.idTag.fields.idtag_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="idtag_state">{{ trans('cruds.idTag.fields.idtag_state') }}</label>
                <input class="form-control {{ $errors->has('idtag_state') ? 'is-invalid' : '' }}" type="text" name="idtag_state" id="idtag_state" value="{{ old('idtag_state', $idTag->idtag_state) }}">
                @if($errors->has('idtag_state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('idtag_state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.idTag.fields.idtag_state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="idtag_zip">{{ trans('cruds.idTag.fields.idtag_zip') }}</label>
                <input class="form-control {{ $errors->has('idtag_zip') ? 'is-invalid' : '' }}" type="text" name="idtag_zip" id="idtag_zip" value="{{ old('idtag_zip', $idTag->idtag_zip) }}">
                @if($errors->has('idtag_zip'))
                    <div class="invalid-feedback">
                        {{ $errors->first('idtag_zip') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.idTag.fields.idtag_zip_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('idtag_verified') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="idtag_verified" value="0">
                    <input class="form-check-input" type="checkbox" name="idtag_verified" id="idtag_verified" value="1" {{ $idTag->idtag_verified || old('idtag_verified', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="idtag_verified">{{ trans('cruds.idTag.fields.idtag_verified') }}</label>
                </div>
                @if($errors->has('idtag_verified'))
                    <div class="invalid-feedback">
                        {{ $errors->first('idtag_verified') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.idTag.fields.idtag_verified_helper') }}</span>
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