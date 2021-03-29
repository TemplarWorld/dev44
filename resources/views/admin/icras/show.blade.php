@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.icra.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.icras.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.id') }}
                        </th>
                        <td>
                            {{ $icra->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.project_name') }}
                        </th>
                        <td>
                            {{ $icra->project_name->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.project_number') }}
                        </th>
                        <td>
                            {{ $icra->project_number->project_number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.project_manager') }}
                        </th>
                        <td>
                            {{ $icra->project_manager->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.project_coordinator') }}
                        </th>
                        <td>
                            {{ $icra->project_coordinator->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.contractor_name') }}
                        </th>
                        <td>
                            {{ $icra->contractor_name->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.contractor_supervisor') }}
                        </th>
                        <td>
                            {{ $icra->contractor_supervisor->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.site_supervisor_tel') }}
                        </th>
                        <td>
                            {{ $icra->site_supervisor_tel->ic_tel ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.project_site') }}
                        </th>
                        <td>
                            {{ $icra->project_site->site ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.project_building') }}
                        </th>
                        <td>
                            {{ $icra->project_building->project_building ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.project_area') }}
                        </th>
                        <td>
                            {{ $icra->project_area->project_area ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.work_type') }}
                        </th>
                        <td>
                            {{ $icra->work_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.project_description') }}
                        </th>
                        <td>
                            {{ $icra->project_description->project_description ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_program') }}
                        </th>
                        <td>
                            {{ $icra->icra_program }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.start_date') }}
                        </th>
                        <td>
                            {{ $icra->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.end_date') }}
                        </th>
                        <td>
                            {{ $icra->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.created_at') }}
                        </th>
                        <td>
                            {{ $icra->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.type_a') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $icra->type_a ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.type_b') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $icra->type_b ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.type_c') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $icra->type_c ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.type_d') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $icra->type_d ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.group_1') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $icra->group_1 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.group_2') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $icra->group_2 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.group_3') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $icra->group_3 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.group_4') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $icra->group_4 ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_pmd') }}
                        </th>
                        <td>
                            {{ App\Icra::ICRA_PMD_SELECT[$icra->icra_pmd] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_areas_impact_side_a') }}
                        </th>
                        <td>
                            {{ App\Icra::ICRA_AREAS_IMPACT_SIDE_A_SELECT[$icra->icra_areas_impact_side_a] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_areas_impact_side_b') }}
                        </th>
                        <td>
                            {{ App\Icra::ICRA_AREAS_IMPACT_SIDE_B_SELECT[$icra->icra_areas_impact_side_b] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_areas_impact_side_c') }}
                        </th>
                        <td>
                            {{ App\Icra::ICRA_AREAS_IMPACT_SIDE_C_SELECT[$icra->icra_areas_impact_side_c] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_areas_impact_side_d') }}
                        </th>
                        <td>
                            {{ App\Icra::ICRA_AREAS_IMPACT_SIDE_D_SELECT[$icra->icra_areas_impact_side_d] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_notes') }}
                        </th>
                        <td>
                            {{ $icra->icra_notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_hoarding_type') }}
                        </th>
                        <td>
                            {{ App\Icra::ICRA_HOARDING_TYPE_SELECT[$icra->icra_hoarding_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_ante_pressure') }}
                        </th>
                        <td>
                            {{ $icra->icra_ante_pressure }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_const_area_pressure') }}
                        </th>
                        <td>
                            {{ $icra->icra_const_area_pressure }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_hepa_unit') }}
                        </th>
                        <td>
                            {{ App\Icra::ICRA_HEPA_UNIT_SELECT[$icra->icra_hepa_unit] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_exhaust') }}
                        </th>
                        <td>
                            {{ App\Icra::ICRA_EXHAUST_SELECT[$icra->icra_exhaust] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_pressure_mon') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $icra->icra_pressure_mon ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_additional') }}
                        </th>
                        <td>
                            {{ $icra->icra_additional }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_requested_by') }}
                        </th>
                        <td>
                            {{ $icra->icra_requested_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_approved_by_1') }}
                        </th>
                        <td>
                            {{ $icra->icra_approved_by_1->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_approved_by_2') }}
                        </th>
                        <td>
                            {{ $icra->icra_approved_by_2->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_approved_by_3') }}
                        </th>
                        <td>
                            {{ $icra->icra_approved_by_3->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_approved_by_4') }}
                        </th>
                        <td>
                            {{ $icra->icra_approved_by_4->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icra.fields.icra_approval_date') }}
                        </th>
                        <td>
                            {{ $icra->icra_approval_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.icras.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection