@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.siteId.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.site-ids.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.siteId.fields.site_name') }}
                        </th>
                        <td>
                            {{ $siteId->site_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteId.fields.site_address_1') }}
                        </th>
                        <td>
                            {{ $siteId->site_address_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteId.fields.site_address_2') }}
                        </th>
                        <td>
                            {{ $siteId->site_address_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteId.fields.site_city') }}
                        </th>
                        <td>
                            {{ $siteId->site_city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteId.fields.site_state') }}
                        </th>
                        <td>
                            {{ $siteId->site_state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteId.fields.site_country') }}
                        </th>
                        <td>
                            {{ $siteId->site_country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteId.fields.site_telephone') }}
                        </th>
                        <td>
                            {{ $siteId->site_telephone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteId.fields.site_email') }}
                        </th>
                        <td>
                            {{ $siteId->site_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteId.fields.site_logo') }}
                        </th>
                        <td>
                            @if($siteId->site_logo)
                                <a href="{{ $siteId->site_logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $siteId->site_logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.site-ids.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection