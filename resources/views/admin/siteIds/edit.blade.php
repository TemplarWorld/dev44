@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.siteId.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.site-ids.update", [$siteId->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="site_name">{{ trans('cruds.siteId.fields.site_name') }}</label>
                <input class="form-control {{ $errors->has('site_name') ? 'is-invalid' : '' }}" type="text" name="site_name" id="site_name" value="{{ old('site_name', $siteId->site_name) }}">
                @if($errors->has('site_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteId.fields.site_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_address_1">{{ trans('cruds.siteId.fields.site_address_1') }}</label>
                <input class="form-control {{ $errors->has('site_address_1') ? 'is-invalid' : '' }}" type="text" name="site_address_1" id="site_address_1" value="{{ old('site_address_1', $siteId->site_address_1) }}">
                @if($errors->has('site_address_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_address_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteId.fields.site_address_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_address_2">{{ trans('cruds.siteId.fields.site_address_2') }}</label>
                <input class="form-control {{ $errors->has('site_address_2') ? 'is-invalid' : '' }}" type="text" name="site_address_2" id="site_address_2" value="{{ old('site_address_2', $siteId->site_address_2) }}">
                @if($errors->has('site_address_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_address_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteId.fields.site_address_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_city">{{ trans('cruds.siteId.fields.site_city') }}</label>
                <input class="form-control {{ $errors->has('site_city') ? 'is-invalid' : '' }}" type="text" name="site_city" id="site_city" value="{{ old('site_city', $siteId->site_city) }}">
                @if($errors->has('site_city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteId.fields.site_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_state">{{ trans('cruds.siteId.fields.site_state') }}</label>
                <input class="form-control {{ $errors->has('site_state') ? 'is-invalid' : '' }}" type="text" name="site_state" id="site_state" value="{{ old('site_state', $siteId->site_state) }}">
                @if($errors->has('site_state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteId.fields.site_state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_country">{{ trans('cruds.siteId.fields.site_country') }}</label>
                <input class="form-control {{ $errors->has('site_country') ? 'is-invalid' : '' }}" type="text" name="site_country" id="site_country" value="{{ old('site_country', $siteId->site_country) }}">
                @if($errors->has('site_country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteId.fields.site_country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_telephone">{{ trans('cruds.siteId.fields.site_telephone') }}</label>
                <input class="form-control {{ $errors->has('site_telephone') ? 'is-invalid' : '' }}" type="text" name="site_telephone" id="site_telephone" value="{{ old('site_telephone', $siteId->site_telephone) }}">
                @if($errors->has('site_telephone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_telephone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteId.fields.site_telephone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_email">{{ trans('cruds.siteId.fields.site_email') }}</label>
                <input class="form-control {{ $errors->has('site_email') ? 'is-invalid' : '' }}" type="text" name="site_email" id="site_email" value="{{ old('site_email', $siteId->site_email) }}">
                @if($errors->has('site_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteId.fields.site_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_logo">{{ trans('cruds.siteId.fields.site_logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('site_logo') ? 'is-invalid' : '' }}" id="site_logo-dropzone">
                </div>
                @if($errors->has('site_logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteId.fields.site_logo_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.siteLogoDropzone = {
    url: '{{ route('admin.site-ids.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="site_logo"]').remove()
      $('form').append('<input type="hidden" name="site_logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="site_logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($siteId) && $siteId->site_logo)
      var file = {!! json_encode($siteId->site_logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="site_logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection