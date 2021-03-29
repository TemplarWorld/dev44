@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.commissioning.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.commissionings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.commissioning.fields.id') }}
                        </th>
                        <td>
                            {{ $commissioning->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissioning.fields.comm_1_worko') }}
                        </th>
                        <td>
                            {{ $commissioning->comm_1_worko }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissioning.fields.project_name') }}
                        </th>
                        <td>
                            {{ $commissioning->project_name->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissioning.fields.project_manager') }}
                        </th>
                        <td>
                            {{ $commissioning->project_manager->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissioning.fields.project_coordinator') }}
                        </th>
                        <td>
                            {{ $commissioning->project_coordinator->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissioning.fields.project_number') }}
                        </th>
                        <td>
                            {{ $commissioning->project_number->project_number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissioning.fields.comm_system_1') }}
                        </th>
                        <td>
                            {{ $commissioning->comm_system_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissioning.fields.comm_location_1') }}
                        </th>
                        <td>
                            {{ $commissioning->comm_location_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissioning.fields.comm_description_1') }}
                        </th>
                        <td>
                            {{ $commissioning->comm_description_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissioning.fields.comm_datestart_1') }}
                        </th>
                        <td>
                            {{ $commissioning->comm_datestart_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissioning.fields.comm_enddate_1') }}
                        </th>
                        <td>
                            {{ $commissioning->comm_enddate_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissioning.fields.comm_starttime_1') }}
                        </th>
                        <td>
                            {{ $commissioning->comm_starttime_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissioning.fields.comm_endtime') }}
                        </th>
                        <td>
                            {{ $commissioning->comm_endtime }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissioning.fields.created_at') }}
                        </th>
                        <td>
                            {{ $commissioning->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commissioning.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $commissioning->updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.commissionings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection