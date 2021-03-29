@extends('layouts.admin')
@section('content')
@can('time_project_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.time-projects.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.timeProject.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TimeProject', 'route' => 'admin.time-projects.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.timeProject.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-TimeProject">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.timeProject.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.timeProject.fields.roles') }}
                    </th>
                    <th>
                        {{ trans('cruds.timeProject.fields.project_coordinator') }}
                    </th>
                    <th>
                        {{ trans('cruds.user.fields.remember_token') }}
                    </th>
                    <th>
                        {{ trans('cruds.timeProject.fields.project_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.timeProject.fields.project_group') }}
                    </th>
                    <th>
                        {{ trans('cruds.timeProject.fields.contractor_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.timeProject.fields.contractor_supervisor') }}
                    </th>
                    <th>
                        {{ trans('cruds.timeProject.fields.site_supervisor_tel') }}
                    </th>
                    <th>
                        {{ trans('cruds.timeProject.fields.site_supervisor_email') }}
                    </th>
                    <th>
                        {{ trans('cruds.timeProject.fields.sub_contractors') }}
                    </th>
                    <th>
                        {{ trans('cruds.timeProject.fields.site') }}
                    </th>
                    <th>
                        {{ trans('cruds.timeProject.fields.project_building') }}
                    </th>
                    <th>
                        {{ trans('cruds.timeProject.fields.project_area') }}
                    </th>
                    <th>
                        {{ trans('cruds.timeProject.fields.work_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.timeProject.fields.project_description') }}
                    </th>
                    <th>
                        {{ trans('cruds.timeProject.fields.start_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.timeProject.fields.end_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.timeProject.fields.created_at') }}
                    </th>
                    <th>
                        {{ trans('cruds.timeProject.fields.updated_at') }}
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
@can('time_project_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.time-projects.massDestroy') }}",
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
    ajax: "{{ route('admin.time-projects.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'name', name: 'name' },
{ data: 'roles_name', name: 'roles.name' },
{ data: 'project_coordinator_name', name: 'project_coordinator.name' },
{ data: 'project_coordinator.remember_token', name: 'project_coordinator.remember_token' },
{ data: 'project_number', name: 'project_number' },
{ data: 'project_group', name: 'project_group' },
{ data: 'contractor_name_name', name: 'contractor_name.name' },
{ data: 'contractor_supervisor_name', name: 'contractor_supervisor.name' },
{ data: 'site_supervisor_tel_ic_tel', name: 'site_supervisor_tel.ic_tel' },
{ data: 'site_supervisor_email_email', name: 'site_supervisor_email.email' },
{ data: 'sub_contractors', name: 'sub_contractors.name' },
{ data: 'site', name: 'site' },
{ data: 'project_building', name: 'project_building' },
{ data: 'project_area', name: 'project_area' },
{ data: 'work_type_name', name: 'work_type.name' },
{ data: 'project_description', name: 'project_description' },
{ data: 'start_date', name: 'start_date' },
{ data: 'end_date', name: 'end_date' },
{ data: 'created_at', name: 'created_at' },
{ data: 'updated_at', name: 'updated_at' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 5, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-TimeProject').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection