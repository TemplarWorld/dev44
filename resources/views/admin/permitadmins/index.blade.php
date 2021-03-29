@extends('layouts.admin')
@section('content')
@can('permitadmin_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.permitadmins.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.permitadmin.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Permitadmin', 'route' => 'admin.permitadmins.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.permitadmin.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Permitadmin">
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
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('permitadmin_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.permitadmins.massDestroy') }}",
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
    ajax: "{{ route('admin.permitadmins.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'submitted_by_name', name: 'submitted_by.name' },
{ data: 'permit_approval', name: 'permit_approval' },
{ data: 'workorder_1', name: 'workorder_1' },
{ data: 'workorder_2', name: 'workorder_2' },
{ data: 'name_name', name: 'name.name' },
{ data: 'project_number_project_number', name: 'project_number.project_number' },
{ data: 'project_number.name', name: 'project_number.name' },
{ data: 'project_manager_name', name: 'project_manager.name' },
{ data: 'project_coordinator_name', name: 'project_coordinator.name' },
{ data: 'contractor_name_name', name: 'contractor_name.name' },
{ data: 'contractor_supervisor_name', name: 'contractor_supervisor.name' },
{ data: 'site_supervisor_tel_ic_tel', name: 'site_supervisor_tel.ic_tel' },
{ data: 'site_supervisor_email_email', name: 'site_supervisor_email.email' },
{ data: 'project_site_site', name: 'project_site.site' },
{ data: 'project_site.project_area', name: 'project_site.project_area' },
{ data: 'project_building_project_building', name: 'project_building.project_building' },
{ data: 'project_area_project_area', name: 'project_area.project_area' },
{ data: 'project_area.project_area', name: 'project_area.project_area' },
{ data: 'work_type_name', name: 'work_type.name' },
{ data: 'permit_description', name: 'permit_description' },
{ data: 'start_date', name: 'start_date' },
{ data: 'end_date', name: 'end_date' },
{ data: 'system_isolation_1', name: 'system_isolation_1' },
{ data: 'start_date_iso_1', name: 'start_date_iso_1' },
{ data: 'end_date_iso_1', name: 'end_date_iso_1' },
{ data: 'start_time_iso_1', name: 'start_time_iso_1' },
{ data: 'end_time_iso_1', name: 'end_time_iso_1' },
{ data: 'system_iso_1_description', name: 'system_iso_1_description' },
{ data: 'iso_1_contractor_name', name: 'iso_1_contractor.name' },
{ data: 'iso_1_contractor.contractor_contact', name: 'iso_1_contractor.contractor_contact' },
{ data: 'iso_contractor_supervisor_name', name: 'iso_contractor_supervisor.name' },
{ data: 'iso_supervisor_tel_ic_tel', name: 'iso_supervisor_tel.ic_tel' },
{ data: 'iso_supervisor_email_email', name: 'iso_supervisor_email.email' },
{ data: 'file_upload', name: 'file_upload', sortable: false, searchable: false },
{ data: 'related_permit', name: 'related_permit' },
{ data: 'hot_work_req', name: 'hot_work_req' },
{ data: 'icra_req', name: 'icra_req' },
{ data: 'hoarding_req', name: 'hoarding_req' },
{ data: 'area_hazard', name: 'area_hazard' },
{ data: 'welding_brazing_silfoss', name: 'welding_brazing_silfoss' },
{ data: 'type_of_abatement', name: 'type_of_abatement' },
{ data: 'jha_swp', name: 'jha_swp' },
{ data: 'fall_protection_plan', name: 'fall_protection_plan' },
{ data: 'confined_space_entry_plan', name: 'confined_space_entry_plan' },
{ data: 'mold_removal_plan', name: 'mold_removal_plan' },
{ data: 'site_conditions', name: 'site_conditions' },
{ data: 'additional_information', name: 'additional_information' },
{ data: 'permit_approved_by_permit_approval_name', name: 'permit_approved_by.permit_approval_name' },
{ data: 'permit_approved_by.permit_approval_department', name: 'permit_approved_by.permit_approval_department' },
{ data: 'permit_approval_date', name: 'permit_approval_date' },
{ data: 'created_at', name: 'created_at' },
{ data: 'updated_at', name: 'updated_at' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Permitadmin').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection