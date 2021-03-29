@can('commissioning_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.commissionings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.commissioning.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.commissioning.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-projectNameCommissionings">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.commissioning.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.commissioning.fields.comm_1_worko') }}
                        </th>
                        <th>
                            {{ trans('cruds.commissioning.fields.project_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.commissioning.fields.project_manager') }}
                        </th>
                        <th>
                            {{ trans('cruds.commissioning.fields.project_coordinator') }}
                        </th>
                        <th>
                            {{ trans('cruds.commissioning.fields.project_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.commissioning.fields.comm_system_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.commissioning.fields.comm_location_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.commissioning.fields.comm_description_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.commissioning.fields.comm_datestart_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.commissioning.fields.comm_enddate_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.commissioning.fields.comm_starttime_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.commissioning.fields.comm_endtime') }}
                        </th>
                        <th>
                            {{ trans('cruds.commissioning.fields.created_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.commissioning.fields.updated_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commissionings as $key => $commissioning)
                        <tr data-entry-id="{{ $commissioning->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $commissioning->id ?? '' }}
                            </td>
                            <td>
                                {{ $commissioning->comm_1_worko ?? '' }}
                            </td>
                            <td>
                                {{ $commissioning->project_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $commissioning->project_manager->name ?? '' }}
                            </td>
                            <td>
                                {{ $commissioning->project_coordinator->name ?? '' }}
                            </td>
                            <td>
                                {{ $commissioning->project_number->project_number ?? '' }}
                            </td>
                            <td>
                                {{ $commissioning->comm_system_1 ?? '' }}
                            </td>
                            <td>
                                {{ $commissioning->comm_location_1 ?? '' }}
                            </td>
                            <td>
                                {{ $commissioning->comm_description_1 ?? '' }}
                            </td>
                            <td>
                                {{ $commissioning->comm_datestart_1 ?? '' }}
                            </td>
                            <td>
                                {{ $commissioning->comm_enddate_1 ?? '' }}
                            </td>
                            <td>
                                {{ $commissioning->comm_starttime_1 ?? '' }}
                            </td>
                            <td>
                                {{ $commissioning->comm_endtime ?? '' }}
                            </td>
                            <td>
                                {{ $commissioning->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $commissioning->updated_at ?? '' }}
                            </td>
                            <td>
                                @can('commissioning_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.commissionings.show', $commissioning->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('commissioning_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.commissionings.edit', $commissioning->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('commissioning_delete')
                                    <form action="{{ route('admin.commissionings.destroy', $commissioning->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('commissioning_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.commissionings.massDestroy') }}",
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
  let table = $('.datatable-projectNameCommissionings:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection