@extends('layouts.admin')
@section('content')
@can('icra_approval_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.icra-approvals.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.icraApproval.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.icraApproval.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-IcraApproval">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.icraApproval.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.icraApproval.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.icraApproval.fields.icra_app_dept') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($icraApprovals as $key => $icraApproval)
                        <tr data-entry-id="{{ $icraApproval->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $icraApproval->id ?? '' }}
                            </td>
                            <td>
                                {{ $icraApproval->name ?? '' }}
                            </td>
                            <td>
                                {{ App\IcraApproval::ICRA_APP_DEPT_SELECT[$icraApproval->icra_app_dept] ?? '' }}
                            </td>
                            <td>
                                @can('icra_approval_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.icra-approvals.show', $icraApproval->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('icra_approval_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.icra-approvals.edit', $icraApproval->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('icra_approval_delete')
                                    <form action="{{ route('admin.icra-approvals.destroy', $icraApproval->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('icra_approval_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.icra-approvals.massDestroy') }}",
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
  let table = $('.datatable-IcraApproval:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection