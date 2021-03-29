@extends('layouts.admin')
@section('content')
@can('icra_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.icras.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.icra.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Icra', 'route' => 'admin.icras.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.icra.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Icra">
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
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('icra_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.icras.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.icras.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'project_name_name', name: 'project_name.name' },
{ data: 'project_number_project_number', name: 'project_number.project_number' },
{ data: 'project_manager_name', name: 'project_manager.name' },
{ data: 'project_coordinator_name', name: 'project_coordinator.name' },
{ data: 'contractor_name_name', name: 'contractor_name.name' },
{ data: 'contractor_supervisor_name', name: 'contractor_supervisor.name' },
{ data: 'site_supervisor_tel_ic_tel', name: 'site_supervisor_tel.ic_tel' },
{ data: 'project_site_site', name: 'project_site.site' },
{ data: 'project_building_project_building', name: 'project_building.project_building' },
{ data: 'project_area_project_area', name: 'project_area.project_area' },
{ data: 'work_type_name', name: 'work_type.name' },
{ data: 'project_description_project_description', name: 'project_description.project_description' },
{ data: 'icra_program', name: 'icra_program' },
{ data: 'start_date', name: 'start_date' },
{ data: 'end_date', name: 'end_date' },
{ data: 'created_at', name: 'created_at' },
{ data: 'type_a', name: 'type_a' },
{ data: 'type_b', name: 'type_b' },
{ data: 'type_c', name: 'type_c' },
{ data: 'type_d', name: 'type_d' },
{ data: 'group_1', name: 'group_1' },
{ data: 'group_2', name: 'group_2' },
{ data: 'group_3', name: 'group_3' },
{ data: 'group_4', name: 'group_4' },
{ data: 'icra_pmd', name: 'icra_pmd' },
{ data: 'icra_areas_impact_side_a', name: 'icra_areas_impact_side_a' },
{ data: 'icra_areas_impact_side_b', name: 'icra_areas_impact_side_b' },
{ data: 'icra_areas_impact_side_c', name: 'icra_areas_impact_side_c' },
{ data: 'icra_areas_impact_side_d', name: 'icra_areas_impact_side_d' },
{ data: 'icra_notes', name: 'icra_notes' },
{ data: 'icra_hoarding_type', name: 'icra_hoarding_type' },
{ data: 'icra_ante_pressure', name: 'icra_ante_pressure' },
{ data: 'icra_const_area_pressure', name: 'icra_const_area_pressure' },
{ data: 'icra_hepa_unit', name: 'icra_hepa_unit' },
{ data: 'icra_exhaust', name: 'icra_exhaust' },
{ data: 'icra_pressure_mon', name: 'icra_pressure_mon' },
{ data: 'icra_additional', name: 'icra_additional' },
{ data: 'icra_requested_by', name: 'icra_requested_by' },
{ data: 'icra_approved_by_1_name', name: 'icra_approved_by_1.name' },
{ data: 'icra_approved_by_1.icra_app_dept', name: 'icra_approved_by_1.icra_app_dept' },
{ data: 'icra_approved_by_2_name', name: 'icra_approved_by_2.name' },
{ data: 'icra_approved_by_3_name', name: 'icra_approved_by_3.name' },
{ data: 'icra_approved_by_4_name', name: 'icra_approved_by_4.name' },
{ data: 'icra_approval_date', name: 'icra_approval_date' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Icra').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection