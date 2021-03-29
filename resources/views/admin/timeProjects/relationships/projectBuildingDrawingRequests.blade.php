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
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-projectBuildingDrawingRequests">
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
                <tbody>
                    @foreach($drawingRequests as $key => $drawingRequest)
                        <tr data-entry-id="{{ $drawingRequest->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $drawingRequest->id ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->tracking_number ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->dr_approval->permit_approval_name ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->dr_requested_by ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->date_required ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->project_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->project_manager->name ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->project_coordinator->name ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->project_description ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->project_group->project_group ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->project_building->project_building ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->project_area->project_area ?? '' }}
                            </td>
                            <td>
                                {{ App\DrawingRequest::DR_1_DISCIPLINE_SELECT[$drawingRequest->dr_1_discipline] ?? '' }}
                            </td>
                            <td>
                                {{ App\DrawingRequest::DR_1_TYPE_SELECT[$drawingRequest->dr_1_type] ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->dr_1_type_description ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->project_building_2 ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->project_area_2 ?? '' }}
                            </td>
                            <td>
                                {{ App\DrawingRequest::DR_2_DISCIPLINE_SELECT[$drawingRequest->dr_2_discipline] ?? '' }}
                            </td>
                            <td>
                                {{ App\DrawingRequest::DR_2_TYPE_SELECT[$drawingRequest->dr_2_type] ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->dr_2_type_description ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->project_building_3 ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->project_area_3 ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->dr_3_type ?? '' }}
                            </td>
                            <td>
                                {{ App\DrawingRequest::DR_1_CIVIL_SELECT[$drawingRequest->dr_1_civil] ?? '' }}
                            </td>
                            <td>
                                {{ App\DrawingRequest::DR_2_CIVIL_SELECT[$drawingRequest->dr_2_civil] ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->civil_other ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->civil_descrip ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->drawing_number_title ?? '' }}
                            </td>
                            <td>
                                {{ $drawingRequest->updated_at ?? '' }}
                            </td>
                            <td>
                                @can('drawing_request_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.drawing-requests.show', $drawingRequest->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('drawing_request_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.drawing-requests.edit', $drawingRequest->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('drawing_request_delete')
                                    <form action="{{ route('admin.drawing-requests.destroy', $drawingRequest->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('drawing_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.drawing-requests.massDestroy') }}",
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
  let table = $('.datatable-projectBuildingDrawingRequests:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection