@extends('layouts.admin')
@section('content')
@can('approval_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.approvals.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.approval.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.approval.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Approval">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.approval.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.approval.fields.permit_approval_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.approval.fields.permit_approval_department') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($approvals as $key => $approval)
                        <tr data-entry-id="{{ $approval->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $approval->id ?? '' }}
                            </td>
                            <td>
                                {{ $approval->permit_approval_name ?? '' }}
                            </td>
                            <td>
                                {{ App\Approval::PERMIT_APPROVAL_DEPARTMENT_SELECT[$approval->permit_approval_department] ?? '' }}
                            </td>
                            <td>
                                @can('approval_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.approvals.show', $approval->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('approval_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.approvals.edit', $approval->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('approval_delete')
                                    <form action="{{ route('admin.approvals.destroy', $approval->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('approval_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.approvals.massDestroy') }}",
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
  let table = $('.datatable-Approval:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection