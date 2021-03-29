@extends('layouts.admin')
@section('content')
@can('drawing_request_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.drawing-requests.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.drawingRequest.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.drawingRequest.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-DrawingRequest">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.created_at') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.tracking_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.dr_approval') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.dr_requested_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.date_required') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.project_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.project_manager') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.project_coordinator') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.project_description') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.project_group') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.project_building') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.project_area') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.dr_1_discipline') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.dr_1_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.dr_1_type_description') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.project_building_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.project_area_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.dr_2_discipline') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.dr_2_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.dr_2_type_description') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.project_building_3') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.project_area_3') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.dr_3_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.dr_1_civil') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.dr_2_civil') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.civil_other') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.civil_descrip') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.drawing_number_title') }}
                    </th>
                    <th>
                        {{ trans('cruds.drawingRequest.fields.updated_at') }}
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
@can('drawing_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.drawing-requests.massDestroy') }}",
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
    ajax: "{{ route('admin.drawing-requests.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'created_at', name: 'created_at' },
{ data: 'tracking_number', name: 'tracking_number' },
{ data: 'dr_approval_permit_approval_name', name: 'dr_approval.permit_approval_name' },
{ data: 'dr_requested_by', name: 'dr_requested_by' },
{ data: 'date_required', name: 'date_required' },
{ data: 'project_name_name', name: 'project_name.name' },
{ data: 'project_manager_name', name: 'project_manager.name' },
{ data: 'project_coordinator_name', name: 'project_coordinator.name' },
{ data: 'project_description', name: 'project_description' },
{ data: 'project_group_project_group', name: 'project_group.project_group' },
{ data: 'project_building_project_building', name: 'project_building.project_building' },
{ data: 'project_area_project_area', name: 'project_area.project_area' },
{ data: 'dr_1_discipline', name: 'dr_1_discipline' },
{ data: 'dr_1_type', name: 'dr_1_type' },
{ data: 'dr_1_type_description', name: 'dr_1_type_description' },
{ data: 'project_building_2', name: 'project_building_2' },
{ data: 'project_area_2', name: 'project_area_2' },
{ data: 'dr_2_discipline', name: 'dr_2_discipline' },
{ data: 'dr_2_type', name: 'dr_2_type' },
{ data: 'dr_2_type_description', name: 'dr_2_type_description' },
{ data: 'project_building_3', name: 'project_building_3' },
{ data: 'project_area_3', name: 'project_area_3' },
{ data: 'dr_3_type', name: 'dr_3_type' },
{ data: 'dr_1_civil', name: 'dr_1_civil' },
{ data: 'dr_2_civil', name: 'dr_2_civil' },
{ data: 'civil_other', name: 'civil_other' },
{ data: 'civil_descrip', name: 'civil_descrip' },
{ data: 'drawing_number_title', name: 'drawing_number_title' },
{ data: 'updated_at', name: 'updated_at' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-DrawingRequest').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection