@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.informationRequest.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.information-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.informationRequest.fields.id') }}
                        </th>
                        <td>
                            {{ $informationRequest->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.informationRequest.fields.created_at') }}
                        </th>
                        <td>
                            {{ $informationRequest->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.informationRequest.fields.requested_by') }}
                        </th>
                        <td>
                            {{ $informationRequest->requested_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.informationRequest.fields.info_tel') }}
                        </th>
                        <td>
                            {{ $informationRequest->info_tel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.informationRequest.fields.req_email') }}
                        </th>
                        <td>
                            {{ $informationRequest->req_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.informationRequest.fields.project_name') }}
                        </th>
                        <td>
                            {{ $informationRequest->project_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.informationRequest.fields.project_manager') }}
                        </th>
                        <td>
                            {{ $informationRequest->project_manager->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.informationRequest.fields.info_date_req') }}
                        </th>
                        <td>
                            {{ $informationRequest->info_date_req }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.informationRequest.fields.info_descrip') }}
                        </th>
                        <td>
                            {{ $informationRequest->info_descrip }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.information-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection