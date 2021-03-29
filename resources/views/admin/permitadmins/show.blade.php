@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.permitadmin.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.permitadmins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.id') }}
                        </th>
                        <td>
                            {{ $permitadmin->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.submitted_by') }}
                        </th>
                        <td>
                            {{ $permitadmin->submitted_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.permit_approval') }}
                        </th>
                        <td>
                            {{ App\Permitadmin::PERMIT_APPROVAL_SELECT[$permitadmin->permit_approval] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.workorder_1') }}
                        </th>
                        <td>
                            {{ $permitadmin->workorder_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.workorder_2') }}
                        </th>
                        <td>
                            {{ $permitadmin->workorder_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.name') }}
                        </th>
                        <td>
                            {{ $permitadmin->name->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.project_number') }}
                        </th>
                        <td>
                            {{ $permitadmin->project_number->project_number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.project_manager') }}
                        </th>
                        <td>
                            {{ $permitadmin->project_manager->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.project_coordinator') }}
                        </th>
                        <td>
                            {{ $permitadmin->project_coordinator->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.contractor_name') }}
                        </th>
                        <td>
                            {{ $permitadmin->contractor_name->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.contractor_supervisor') }}
                        </th>
                        <td>
                            {{ $permitadmin->contractor_supervisor->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.site_supervisor_tel') }}
                        </th>
                        <td>
                            {{ $permitadmin->site_supervisor_tel->ic_tel ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.site_supervisor_email') }}
                        </th>
                        <td>
                            {{ $permitadmin->site_supervisor_email->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.project_site') }}
                        </th>
                        <td>
                            {{ $permitadmin->project_site->site ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.project_building') }}
                        </th>
                        <td>
                            {{ $permitadmin->project_building->project_building ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.project_area') }}
                        </th>
                        <td>
                            {{ $permitadmin->project_area->project_area ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.work_type') }}
                        </th>
                        <td>
                            {{ $permitadmin->work_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.permit_description') }}
                        </th>
                        <td>
                            {{ $permitadmin->permit_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.start_date') }}
                        </th>
                        <td>
                            {{ $permitadmin->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.end_date') }}
                        </th>
                        <td>
                            {{ $permitadmin->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.system_isolation_1') }}
                        </th>
                        <td>
                            {{ App\Permitadmin::SYSTEM_ISOLATION_1_SELECT[$permitadmin->system_isolation_1] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.start_date_iso_1') }}
                        </th>
                        <td>
                            {{ $permitadmin->start_date_iso_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.end_date_iso_1') }}
                        </th>
                        <td>
                            {{ $permitadmin->end_date_iso_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.start_time_iso_1') }}
                        </th>
                        <td>
                            {{ $permitadmin->start_time_iso_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.end_time_iso_1') }}
                        </th>
                        <td>
                            {{ $permitadmin->end_time_iso_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.system_iso_1_description') }}
                        </th>
                        <td>
                            {{ $permitadmin->system_iso_1_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.iso_1_contractor') }}
                        </th>
                        <td>
                            {{ $permitadmin->iso_1_contractor->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.iso_contractor_supervisor') }}
                        </th>
                        <td>
                            {{ $permitadmin->iso_contractor_supervisor->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.iso_supervisor_tel') }}
                        </th>
                        <td>
                            {{ $permitadmin->iso_supervisor_tel->ic_tel ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.iso_supervisor_email') }}
                        </th>
                        <td>
                            {{ $permitadmin->iso_supervisor_email->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.file_upload') }}
                        </th>
                        <td>
                            @foreach($permitadmin->file_upload as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.related_permit') }}
                        </th>
                        <td>
                            {{ $permitadmin->related_permit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.hot_work_req') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $permitadmin->hot_work_req ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.icra_req') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $permitadmin->icra_req ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.hoarding_req') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $permitadmin->hoarding_req ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.area_hazard') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $permitadmin->area_hazard ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.welding_brazing_silfoss') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $permitadmin->welding_brazing_silfoss ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.type_of_abatement') }}
                        </th>
                        <td>
                            {{ $permitadmin->type_of_abatement }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.jha_swp') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $permitadmin->jha_swp ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.fall_protection_plan') }}
                        </th>
                        <td>
                            {{ App\Permitadmin::FALL_PROTECTION_PLAN_SELECT[$permitadmin->fall_protection_plan] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.confined_space_entry_plan') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $permitadmin->confined_space_entry_plan ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.mold_removal_plan') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $permitadmin->mold_removal_plan ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.site_conditions') }}
                        </th>
                        <td>
                            {{ $permitadmin->site_conditions }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.additional_information') }}
                        </th>
                        <td>
                            {{ $permitadmin->additional_information }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.permit_approved_by') }}
                        </th>
                        <td>
                            {{ $permitadmin->permit_approved_by->permit_approval_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.permit_approval_date') }}
                        </th>
                        <td>
                            {{ $permitadmin->permit_approval_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.created_at') }}
                        </th>
                        <td>
                            {{ $permitadmin->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permitadmin.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $permitadmin->updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.permitadmins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection