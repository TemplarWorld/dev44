@can('permitadmin_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.permitadmins.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.permitadmin.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.permitadmin.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-iso1ContractorPermitadmins">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.submitted_by') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.permit_approval') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.workorder_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.workorder_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.project_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeProject.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.project_manager') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.project_coordinator') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.contractor_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.contractor_supervisor') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.site_supervisor_tel') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.site_supervisor_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.project_site') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeProject.fields.project_area') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.project_building') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.project_area') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeProject.fields.project_area') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.work_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.permit_description') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.system_isolation_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.start_date_iso_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.end_date_iso_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.start_time_iso_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.end_time_iso_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.system_iso_1_description') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.iso_1_contractor') }}
                        </th>
                        <th>
                            {{ trans('cruds.contractor.fields.contractor_contact') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.iso_contractor_supervisor') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.iso_supervisor_tel') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.iso_supervisor_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.file_upload') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.related_permit') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.hot_work_req') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.icra_req') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.hoarding_req') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.area_hazard') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.welding_brazing_silfoss') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.type_of_abatement') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.jha_swp') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.fall_protection_plan') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.confined_space_entry_plan') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.mold_removal_plan') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.site_conditions') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.additional_information') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.permit_approved_by') }}
                        </th>
                        <th>
                            {{ trans('cruds.approval.fields.permit_approval_department') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.permit_approval_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.created_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.permitadmin.fields.updated_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permitadmins as $key => $permitadmin)
                        <tr data-entry-id="{{ $permitadmin->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $permitadmin->id ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->submitted_by->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Permitadmin::PERMIT_APPROVAL_SELECT[$permitadmin->permit_approval] ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->workorder_1 ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->workorder_2 ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->name->name ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->project_number->project_number ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->project_number->name ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->project_manager->name ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->project_coordinator->name ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->contractor_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->contractor_supervisor->name ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->site_supervisor_tel->ic_tel ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->site_supervisor_email->email ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->project_site->site ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->project_site->project_area ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->project_building->project_building ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->project_area->project_area ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->project_area->project_area ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->work_type->name ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->permit_description ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->end_date ?? '' }}
                            </td>
                            <td>
                                {{ App\Permitadmin::SYSTEM_ISOLATION_1_SELECT[$permitadmin->system_isolation_1] ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->start_date_iso_1 ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->end_date_iso_1 ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->start_time_iso_1 ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->end_time_iso_1 ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->system_iso_1_description ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->iso_1_contractor->name ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->iso_1_contractor->contractor_contact ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->iso_contractor_supervisor->name ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->iso_supervisor_tel->ic_tel ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->iso_supervisor_email->email ?? '' }}
                            </td>
                            <td>
                                @foreach($permitadmin->file_upload as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $permitadmin->related_permit ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $permitadmin->hot_work_req ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $permitadmin->hot_work_req ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $permitadmin->icra_req ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $permitadmin->icra_req ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $permitadmin->hoarding_req ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $permitadmin->hoarding_req ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $permitadmin->area_hazard ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $permitadmin->area_hazard ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $permitadmin->welding_brazing_silfoss ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $permitadmin->welding_brazing_silfoss ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $permitadmin->type_of_abatement ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $permitadmin->jha_swp ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $permitadmin->jha_swp ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ App\Permitadmin::FALL_PROTECTION_PLAN_SELECT[$permitadmin->fall_protection_plan] ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $permitadmin->confined_space_entry_plan ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $permitadmin->confined_space_entry_plan ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $permitadmin->mold_removal_plan ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $permitadmin->mold_removal_plan ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $permitadmin->site_conditions ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->additional_information ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->permit_approved_by->permit_approval_name ?? '' }}
                            </td>
                            <td>
                                @if($permitadmin->permit_approved_by)
                                    {{ $permitadmin->permit_approved_by::PERMIT_APPROVAL_DEPARTMENT_SELECT[$permitadmin->permit_approved_by->permit_approval_department] ?? '' }}
                                @endif
                            </td>
                            <td>
                                {{ $permitadmin->permit_approval_date ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $permitadmin->updated_at ?? '' }}
                            </td>
                            <td>
                                @can('permitadmin_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.permitadmins.show', $permitadmin->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('permitadmin_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.permitadmins.edit', $permitadmin->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('permitadmin_delete')
                                    <form action="{{ route('admin.permitadmins.destroy', $permitadmin->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('permitadmin_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.permitadmins.massDestroy') }}",
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
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-iso1ContractorPermitadmins:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection