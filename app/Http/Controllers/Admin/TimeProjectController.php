<?php

namespace App\Http\Controllers\Admin;

use App\Contractor;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTimeProjectRequest;
use App\Http\Requests\StoreTimeProjectRequest;
use App\Http\Requests\UpdateTimeProjectRequest;
use App\IdTag;
use App\TimeProject;
use App\TimeWorkType;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TimeProjectController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('time_project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TimeProject::with(['roles', 'project_coordinator', 'contractor_name', 'contractor_supervisor', 'site_supervisor_tel', 'site_supervisor_email', 'sub_contractors', 'work_type', 'team'])->select(sprintf('%s.*', (new TimeProject)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'time_project_show';
                $editGate      = 'time_project_edit';
                $deleteGate    = 'time_project_delete';
                $crudRoutePart = 'time-projects';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->addColumn('roles_name', function ($row) {
                return $row->roles ? $row->roles->name : '';
            });

            $table->addColumn('project_coordinator_name', function ($row) {
                return $row->project_coordinator ? $row->project_coordinator->name : '';
            });

            $table->editColumn('project_coordinator.remember_token', function ($row) {
                return $row->project_coordinator ? (is_string($row->project_coordinator) ? $row->project_coordinator : $row->project_coordinator->remember_token) : '';
            });
            $table->editColumn('project_number', function ($row) {
                return $row->project_number ? $row->project_number : "";
            });
            $table->editColumn('project_group', function ($row) {
                return $row->project_group ? TimeProject::PROJECT_GROUP_SELECT[$row->project_group] : '';
            });
            $table->addColumn('contractor_name_name', function ($row) {
                return $row->contractor_name ? $row->contractor_name->name : '';
            });

            $table->addColumn('contractor_supervisor_name', function ($row) {
                return $row->contractor_supervisor ? $row->contractor_supervisor->name : '';
            });

            $table->addColumn('site_supervisor_tel_ic_tel', function ($row) {
                return $row->site_supervisor_tel ? $row->site_supervisor_tel->ic_tel : '';
            });

            $table->addColumn('site_supervisor_email_email', function ($row) {
                return $row->site_supervisor_email ? $row->site_supervisor_email->email : '';
            });

            $table->editColumn('sub_contractors', function ($row) {
                $labels = [];

                foreach ($row->sub_contractors as $sub_contractor) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $sub_contractor->name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('site', function ($row) {
                return $row->site ? $row->site : "";
            });
            $table->editColumn('project_building', function ($row) {
                return $row->project_building ? $row->project_building : "";
            });
            $table->editColumn('project_area', function ($row) {
                return $row->project_area ? $row->project_area : "";
            });
            $table->addColumn('work_type_name', function ($row) {
                return $row->work_type ? $row->work_type->name : '';
            });

            $table->editColumn('project_description', function ($row) {
                return $row->project_description ? $row->project_description : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'roles', 'project_coordinator', 'contractor_name', 'contractor_supervisor', 'site_supervisor_tel', 'site_supervisor_email', 'sub_contractors', 'work_type']);

            return $table->make(true);
        }

        return view('admin.timeProjects.index');
    }

    public function create()
    {
        abort_if(Gate::denies('time_project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_coordinators = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contractor_names = Contractor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contractor_supervisors = IdTag::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $site_supervisor_tels = IdTag::all()->pluck('ic_tel', 'id')->prepend(trans('global.pleaseSelect'), '');

        $site_supervisor_emails = IdTag::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sub_contractors = Contractor::all()->pluck('name', 'id');

        $work_types = TimeWorkType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.timeProjects.create', compact('roles', 'project_coordinators', 'contractor_names', 'contractor_supervisors', 'site_supervisor_tels', 'site_supervisor_emails', 'sub_contractors', 'work_types'));
    }

    public function store(StoreTimeProjectRequest $request)
    {
        $timeProject = TimeProject::create($request->all());
        $timeProject->sub_contractors()->sync($request->input('sub_contractors', []));

        return redirect()->route('admin.time-projects.index');
    }

    public function edit(TimeProject $timeProject)
    {
        abort_if(Gate::denies('time_project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_coordinators = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contractor_names = Contractor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contractor_supervisors = IdTag::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $site_supervisor_tels = IdTag::all()->pluck('ic_tel', 'id')->prepend(trans('global.pleaseSelect'), '');

        $site_supervisor_emails = IdTag::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sub_contractors = Contractor::all()->pluck('name', 'id');

        $work_types = TimeWorkType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $timeProject->load('roles', 'project_coordinator', 'contractor_name', 'contractor_supervisor', 'site_supervisor_tel', 'site_supervisor_email', 'sub_contractors', 'work_type', 'team');

        return view('admin.timeProjects.edit', compact('roles', 'project_coordinators', 'contractor_names', 'contractor_supervisors', 'site_supervisor_tels', 'site_supervisor_emails', 'sub_contractors', 'work_types', 'timeProject'));
    }

    public function update(UpdateTimeProjectRequest $request, TimeProject $timeProject)
    {
        $timeProject->update($request->all());
        $timeProject->sub_contractors()->sync($request->input('sub_contractors', []));

        return redirect()->route('admin.time-projects.index');
    }

    public function show(TimeProject $timeProject)
    {
        abort_if(Gate::denies('time_project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timeProject->load('roles', 'project_coordinator', 'contractor_name', 'contractor_supervisor', 'site_supervisor_tel', 'site_supervisor_email', 'sub_contractors', 'work_type', 'team', 'namePermitadmins', 'projectNumberPermitadmins', 'projectSitePermitadmins', 'projectBuildingPermitadmins', 'projectAreaPermitadmins', 'projectNameIcras', 'projectNumberIcras', 'projectNameDrawingRequests', 'projectGroupDrawingRequests', 'projectBuildingDrawingRequests', 'projectAreaDrawingRequests', 'projectNameCommissionings');

        return view('admin.timeProjects.show', compact('timeProject'));
    }

    public function destroy(TimeProject $timeProject)
    {
        abort_if(Gate::denies('time_project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timeProject->delete();

        return back();
    }

    public function massDestroy(MassDestroyTimeProjectRequest $request)
    {
        TimeProject::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
