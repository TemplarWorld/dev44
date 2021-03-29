@can('icra_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.icras.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.icra.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.icra.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-contractorSupervisorIcras">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.project_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.project_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.project_manager') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.project_coordinator') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.contractor_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.contractor_supervisor') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.site_supervisor_tel') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.project_site') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.project_building') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.project_area') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.work_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.project_description') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_program') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.created_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.type_a') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.type_b') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.type_c') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.type_d') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.group_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.group_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.group_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.group_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_pmd') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_areas_impact_side_a') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_areas_impact_side_b') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_areas_impact_side_c') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_areas_impact_side_d') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_notes') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_hoarding_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_ante_pressure') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_const_area_pressure') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_hepa_unit') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_exhaust') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_pressure_mon') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_additional') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_requested_by') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_approved_by_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.icraApproval.fields.icra_app_dept') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_approved_by_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_approved_by_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_approved_by_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.icra.fields.icra_approval_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($icras as $key => $icra)
                        <tr data-entry-id="{{ $icra->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $icra->id ?? '' }}
                            </td>
                            <td>
                                {{ $icra->project_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $icra->project_number->project_number ?? '' }}
                            </td>
                            <td>
                                {{ $icra->project_manager->name ?? '' }}
                            </td>
                            <td>
                                {{ $icra->project_coordinator->name ?? '' }}
                            </td>
                            <td>
                                {{ $icra->contractor_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $icra->contractor_supervisor->name ?? '' }}
                            </td>
                            <td>
                                {{ $icra->site_supervisor_tel->ic_tel ?? '' }}
                            </td>
                            <td>
                                {{ $icra->project_site->site ?? '' }}
                            </td>
                            <td>
                                {{ $icra->project_building->project_building ?? '' }}
                            </td>
                            <td>
                                {{ $icra->project_area->project_area ?? '' }}
                            </td>
                            <td>
                                {{ $icra->work_type->name ?? '' }}
                            </td>
                            <td>
                                {{ $icra->project_description->project_description ?? '' }}
                            </td>
                            <td>
                                {{ $icra->icra_program ?? '' }}
                            </td>
                            <td>
                                {{ $icra->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $icra->end_date ?? '' }}
                            </td>
                            <td>
                                {{ $icra->created_at ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $icra->type_a ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $icra->type_a ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $icra->type_b ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $icra->type_b ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $icra->type_c ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $icra->type_c ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $icra->type_d ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $icra->type_d ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $icra->group_1 ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $icra->group_1 ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $icra->group_2 ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $icra->group_2 ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $icra->group_3 ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $icra->group_3 ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $icra->group_4 ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $icra->group_4 ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ App\Icra::ICRA_PMD_SELECT[$icra->icra_pmd] ?? '' }}
                            </td>
                            <td>
                                {{ App\Icra::ICRA_AREAS_IMPACT_SIDE_A_SELECT[$icra->icra_areas_impact_side_a] ?? '' }}
                            </td>
                            <td>
                                {{ App\Icra::ICRA_AREAS_IMPACT_SIDE_B_SELECT[$icra->icra_areas_impact_side_b] ?? '' }}
                            </td>
                            <td>
                                {{ App\Icra::ICRA_AREAS_IMPACT_SIDE_C_SELECT[$icra->icra_areas_impact_side_c] ?? '' }}
                            </td>
                            <td>
                                {{ App\Icra::ICRA_AREAS_IMPACT_SIDE_D_SELECT[$icra->icra_areas_impact_side_d] ?? '' }}
                            </td>
                            <td>
                                {{ $icra->icra_notes ?? '' }}
                            </td>
                            <td>
                                {{ App\Icra::ICRA_HOARDING_TYPE_SELECT[$icra->icra_hoarding_type] ?? '' }}
                            </td>
                            <td>
                                {{ $icra->icra_ante_pressure ?? '' }}
                            </td>
                            <td>
                                {{ $icra->icra_const_area_pressure ?? '' }}
                            </td>
                            <td>
                                {{ App\Icra::ICRA_HEPA_UNIT_SELECT[$icra->icra_hepa_unit] ?? '' }}
                            </td>
                            <td>
                                {{ App\Icra::ICRA_EXHAUST_SELECT[$icra->icra_exhaust] ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $icra->icra_pressure_mon ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $icra->icra_pressure_mon ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $icra->icra_additional ?? '' }}
                            </td>
                            <td>
                                {{ $icra->icra_requested_by ?? '' }}
                            </td>
                            <td>
                                {{ $icra->icra_approved_by_1->name ?? '' }}
                            </td>
                            <td>
                                @if($icra->icra_approved_by_1)
                                    {{ $icra->icra_approved_by_1::ICRA_APP_DEPT_SELECT[$icra->icra_approved_by_1->icra_app_dept] ?? '' }}
                                @endif
                            </td>
                            <td>
                                {{ $icra->icra_approved_by_2->name ?? '' }}
                            </td>
                            <td>
                                {{ $icra->icra_approved_by_3->name ?? '' }}
                            </td>
                            <td>
                                {{ $icra->icra_approved_by_4->name ?? '' }}
                            </td>
                            <td>
                                {{ $icra->icra_approval_date ?? '' }}
                            </td>
                            <td>
                                @can('icra_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.icras.show', $icra->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('icra_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.icras.edit', $icra->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('icra_delete')
                                    <form action="{{ route('admin.icras.destroy', $icra->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('icra_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.icras.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-contractorSupervisorIcras:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection