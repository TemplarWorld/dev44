@extends('layouts.admin')
@section('content')
@can('information_request_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.information-requests.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.informationRequest.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.informationRequest.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-InformationRequest">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.informationRequest.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.informationRequest.fields.created_at') }}
                    </th>
                    <th>
                        {{ trans('cruds.informationRequest.fields.requested_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.informationRequest.fields.info_tel') }}
                    </th>
                    <th>
                        {{ trans('cruds.informationRequest.fields.req_email') }}
                    </th>
                    <th>
                        {{ trans('cruds.informationRequest.fields.project_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.informationRequest.fields.project_manager') }}
                    </th>
                    <th>
                        {{ trans('cruds.informationRequest.fields.info_date_req') }}
                    </th>
                    <th>
                        {{ trans('cruds.informationRequest.fields.info_descrip') }}
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
@can('information_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.information-requests.massDestroy') }}",
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
    ajax: "{{ route('admin.information-requests.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'created_at', name: 'created_at' },
{ data: 'requested_by', name: 'requested_by' },
{ data: 'info_tel', name: 'info_tel' },
{ data: 'req_email', name: 'req_email' },
{ data: 'project_name', name: 'project_name' },
{ data: 'project_manager_name', name: 'project_manager.name' },
{ data: 'info_date_req', name: 'info_date_req' },
{ data: 'info_descrip', name: 'info_descrip' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-InformationRequest').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection