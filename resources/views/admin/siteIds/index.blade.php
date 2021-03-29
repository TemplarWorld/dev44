@extends('layouts.admin')
@section('content')
@can('site_id_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.site-ids.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.siteId.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.siteId.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-SiteId">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.siteId.fields.site_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.siteId.fields.site_address_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.siteId.fields.site_address_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.siteId.fields.site_city') }}
                    </th>
                    <th>
                        {{ trans('cruds.siteId.fields.site_state') }}
                    </th>
                    <th>
                        {{ trans('cruds.siteId.fields.site_country') }}
                    </th>
                    <th>
                        {{ trans('cruds.siteId.fields.site_telephone') }}
                    </th>
                    <th>
                        {{ trans('cruds.siteId.fields.site_email') }}
                    </th>
                    <th>
                        {{ trans('cruds.siteId.fields.site_logo') }}
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
@can('site_id_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.site-ids.massDestroy') }}",
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
    ajax: "{{ route('admin.site-ids.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'site_name', name: 'site_name' },
{ data: 'site_address_1', name: 'site_address_1' },
{ data: 'site_address_2', name: 'site_address_2' },
{ data: 'site_city', name: 'site_city' },
{ data: 'site_state', name: 'site_state' },
{ data: 'site_country', name: 'site_country' },
{ data: 'site_telephone', name: 'site_telephone' },
{ data: 'site_email', name: 'site_email' },
{ data: 'site_logo', name: 'site_logo', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-SiteId').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection