@can('time_project_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.time-projects.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.timeProject.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.timeProject.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-workTypeTimeProjects">
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
                <tbody>
                    @foreach($timeProjects as $key => $timeProject)
                        <tr data-entry-id="{{ $timeProject->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $timeProject->name ?? '' }}
                            </td>
                            <td>
                                {{ $timeProject->roles->name ?? '' }}
                            </td>
                            <td>
                                {{ $timeProject->project_coordinator->name ?? '' }}
                            </td>
                            <td>
                                {{ $timeProject->project_coordinator->remember_token ?? '' }}
                            </td>
                            <td>
                                {{ $timeProject->project_number ?? '' }}
                            </td>
                            <td>
                                {{ App\TimeProject::PROJECT_GROUP_SELECT[$timeProject->project_group] ?? '' }}
                            </td>
                            <td>
                                {{ $timeProject->contractor_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $timeProject->contractor_supervisor->name ?? '' }}
                            </td>
                            <td>
                                {{ $timeProject->site_supervisor_tel->ic_tel ?? '' }}
                            </td>
                            <td>
                                {{ $timeProject->site_supervisor_email->email ?? '' }}
                            </td>
                            <td>
                                @foreach($timeProject->sub_contractors as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $timeProject->site ?? '' }}
                            </td>
                            <td>
                                {{ $timeProject->project_building ?? '' }}
                            </td>
                            <td>
                                {{ $timeProject->project_area ?? '' }}
                            </td>
                            <td>
                                {{ $timeProject->work_type->name ?? '' }}
                            </td>
                            <td>
                                {{ $timeProject->project_description ?? '' }}
                            </td>
                            <td>
                                {{ $timeProject->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $timeProject->end_date ?? '' }}
                            </td>
                            <td>
                                {{ $timeProject->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $timeProject->updated_at ?? '' }}
                            </td>
                            <td>
                                @can('time_project_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.time-projects.show', $timeProject->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('time_project_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.time-projects.edit', $timeProject->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('time_project_delete')
                                    <form action="{{ route('admin.time-projects.destroy', $timeProject->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('time_project_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.time-projects.massDestroy') }}",
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
    order: [[ 5, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-workTypeTimeProjects:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection