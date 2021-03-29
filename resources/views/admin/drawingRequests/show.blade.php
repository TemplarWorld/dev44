@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.drawingRequest.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.drawing-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.id') }}
                        </th>
                        <td>
                            {{ $drawingRequest->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.created_at') }}
                        </th>
                        <td>
                            {{ $drawingRequest->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.tracking_number') }}
                        </th>
                        <td>
                            {{ $drawingRequest->tracking_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.dr_approval') }}
                        </th>
                        <td>
                            {{ $drawingRequest->dr_approval->permit_approval_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.dr_requested_by') }}
                        </th>
                        <td>
                            {{ $drawingRequest->dr_requested_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.date_required') }}
                        </th>
                        <td>
                            {{ $drawingRequest->date_required }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.project_name') }}
                        </th>
                        <td>
                            {{ $drawingRequest->project_name->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.project_manager') }}
                        </th>
                        <td>
                            {{ $drawingRequest->project_manager->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.project_coordinator') }}
                        </th>
                        <td>
                            {{ $drawingRequest->project_coordinator->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.project_description') }}
                        </th>
                        <td>
                            {{ $drawingRequest->project_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.project_group') }}
                        </th>
                        <td>
                            {{ $drawingRequest->project_group->project_group ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.project_building') }}
                        </th>
                        <td>
                            {{ $drawingRequest->project_building->project_building ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.project_area') }}
                        </th>
                        <td>
                            {{ $drawingRequest->project_area->project_area ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.dr_1_discipline') }}
                        </th>
                        <td>
                            {{ App\DrawingRequest::DR_1_DISCIPLINE_SELECT[$drawingRequest->dr_1_discipline] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.dr_1_type') }}
                        </th>
                        <td>
                            {{ App\DrawingRequest::DR_1_TYPE_SELECT[$drawingRequest->dr_1_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.dr_1_type_description') }}
                        </th>
                        <td>
                            {{ $drawingRequest->dr_1_type_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.project_building_2') }}
                        </th>
                        <td>
                            {{ $drawingRequest->project_building_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.project_area_2') }}
                        </th>
                        <td>
                            {{ $drawingRequest->project_area_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.dr_2_discipline') }}
                        </th>
                        <td>
                            {{ App\DrawingRequest::DR_2_DISCIPLINE_SELECT[$drawingRequest->dr_2_discipline] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.dr_2_type') }}
                        </th>
                        <td>
                            {{ App\DrawingRequest::DR_2_TYPE_SELECT[$drawingRequest->dr_2_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.dr_2_type_description') }}
                        </th>
                        <td>
                            {{ $drawingRequest->dr_2_type_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.project_building_3') }}
                        </th>
                        <td>
                            {{ $drawingRequest->project_building_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.project_area_3') }}
                        </th>
                        <td>
                            {{ $drawingRequest->project_area_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.dr_3_type') }}
                        </th>
                        <td>
                            {{ $drawingRequest->dr_3_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.dr_1_civil') }}
                        </th>
                        <td>
                            {{ App\DrawingRequest::DR_1_CIVIL_SELECT[$drawingRequest->dr_1_civil] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.dr_2_civil') }}
                        </th>
                        <td>
                            {{ App\DrawingRequest::DR_2_CIVIL_SELECT[$drawingRequest->dr_2_civil] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.civil_other') }}
                        </th>
                        <td>
                            {{ $drawingRequest->civil_other }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.civil_descrip') }}
                        </th>
                        <td>
                            {{ $drawingRequest->civil_descrip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.drawing_number_title') }}
                        </th>
                        <td>
                            {{ $drawingRequest->drawing_number_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.drawingRequest.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $drawingRequest->updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.drawing-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection