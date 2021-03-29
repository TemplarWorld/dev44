<?php

namespace App\Http\Controllers\Admin;

use App\Approval;
use App\DrawingRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDrawingRequestRequest;
use App\Http\Requests\StoreDrawingRequestRequest;
use App\Http\Requests\UpdateDrawingRequestRequest;
use App\TimeProject;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DrawingRequestController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('drawing_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = DrawingRequest::with(['dr_approval', 'project_name', 'project_manager', 'project_coordinator', 'project_group', 'project_building', 'project_area', 'team'])->select(sprintf('%s.*', (new DrawingRequest)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'drawing_request_show';
                $editGate      = 'drawing_request_edit';
                $deleteGate    = 'drawing_request_delete';
                $crudRoutePart = 'drawing-requests';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });

            $table->editColumn('tracking_number', function ($row) {
                return $row->tracking_number ? $row->tracking_number : "";
            });
            $table->addColumn('dr_approval_permit_approval_name', function ($row) {
                return $row->dr_approval ? $row->dr_approval->permit_approval_name : '';
            });

            $table->editColumn('dr_requested_by', function ($row) {
                return $row->dr_requested_by ? $row->dr_requested_by : "";
            });

            $table->addColumn('project_name_name', function ($row) {
                return $row->project_name ? $row->project_name->name : '';
            });

            $table->addColumn('project_manager_name', function ($row) {
                return $row->project_manager ? $row->project_manager->name : '';
            });

            $table->addColumn('project_coordinator_name', function ($row) {
                return $row->project_coordinator ? $row->project_coordinator->name : '';
            });

            $table->editColumn('project_description', function ($row) {
                return $row->project_description ? $row->project_description : "";
            });
            $table->addColumn('project_group_project_group', function ($row) {
                return $row->project_group ? $row->project_group->project_group : '';
            });

            $table->addColumn('project_building_project_building', function ($row) {
                return $row->project_building ? $row->project_building->project_building : '';
            });

            $table->addColumn('project_area_project_area', function ($row) {
                return $row->project_area ? $row->project_area->project_area : '';
            });

            $table->editColumn('dr_1_discipline', function ($row) {
                return $row->dr_1_discipline ? DrawingRequest::DR_1_DISCIPLINE_SELECT[$row->dr_1_discipline] : '';
            });
            $table->editColumn('dr_1_type', function ($row) {
                return $row->dr_1_type ? DrawingRequest::DR_1_TYPE_SELECT[$row->dr_1_type] : '';
            });
            $table->editColumn('dr_1_type_description', function ($row) {
                return $row->dr_1_type_description ? $row->dr_1_type_description : "";
            });
            $table->editColumn('project_building_2', function ($row) {
                return $row->project_building_2 ? $row->project_building_2 : "";
            });
            $table->editColumn('project_area_2', function ($row) {
                return $row->project_area_2 ? $row->project_area_2 : "";
            });
            $table->editColumn('dr_2_discipline', function ($row) {
                return $row->dr_2_discipline ? DrawingRequest::DR_2_DISCIPLINE_SELECT[$row->dr_2_discipline] : '';
            });
            $table->editColumn('dr_2_type', function ($row) {
                return $row->dr_2_type ? DrawingRequest::DR_2_TYPE_SELECT[$row->dr_2_type] : '';
            });
            $table->editColumn('dr_2_type_description', function ($row) {
                return $row->dr_2_type_description ? $row->dr_2_type_description : "";
            });
            $table->editColumn('project_building_3', function ($row) {
                return $row->project_building_3 ? $row->project_building_3 : "";
            });
            $table->editColumn('project_area_3', function ($row) {
                return $row->project_area_3 ? $row->project_area_3 : "";
            });
            $table->editColumn('dr_3_type', function ($row) {
                return $row->dr_3_type ? $row->dr_3_type : "";
            });
            $table->editColumn('dr_1_civil', function ($row) {
                return $row->dr_1_civil ? DrawingRequest::DR_1_CIVIL_SELECT[$row->dr_1_civil] : '';
            });
            $table->editColumn('dr_2_civil', function ($row) {
                return $row->dr_2_civil ? DrawingRequest::DR_2_CIVIL_SELECT[$row->dr_2_civil] : '';
            });
            $table->editColumn('civil_other', function ($row) {
                return $row->civil_other ? $row->civil_other : "";
            });
            $table->editColumn('civil_descrip', function ($row) {
                return $row->civil_descrip ? $row->civil_descrip : "";
            });
            $table->editColumn('drawing_number_title', function ($row) {
                return $row->drawing_number_title ? $row->drawing_number_title : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'dr_approval', 'project_name', 'project_manager', 'project_coordinator', 'project_group', 'project_building', 'project_area']);

            return $table->make(true);
        }

        return view('admin.drawingRequests.index');
    }

    public function create()
    {
        abort_if(Gate::denies('drawing_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dr_approvals = Approval::all()->pluck('permit_approval_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_names = TimeProject::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_managers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_coordinators = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_groups = TimeProject::all()->pluck('project_group', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_buildings = TimeProject::all()->pluck('project_building', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_areas = TimeProject::all()->pluck('project_area', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.drawingRequests.create', compact('dr_approvals', 'project_names', 'project_managers', 'project_coordinators', 'project_groups', 'project_buildings', 'project_areas'));
    }

    public function store(StoreDrawingRequestRequest $request)
    {
        $drawingRequest = DrawingRequest::create($request->all());

        return redirect()->route('admin.drawing-requests.index');
    }

    public function edit(DrawingRequest $drawingRequest)
    {
        abort_if(Gate::denies('drawing_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dr_approvals = Approval::all()->pluck('permit_approval_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_names = TimeProject::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_managers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_coordinators = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_groups = TimeProject::all()->pluck('project_group', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_buildings = TimeProject::all()->pluck('project_building', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_areas = TimeProject::all()->pluck('project_area', 'id')->prepend(trans('global.pleaseSelect'), '');

        $drawingRequest->load('dr_approval', 'project_name', 'project_manager', 'project_coordinator', 'project_group', 'project_building', 'project_area', 'team');

        return view('admin.drawingRequests.edit', compact('dr_approvals', 'project_names', 'project_managers', 'project_coordinators', 'project_groups', 'project_buildings', 'project_areas', 'drawingRequest'));
    }

    public function update(UpdateDrawingRequestRequest $request, DrawingRequest $drawingRequest)
    {
        $drawingRequest->update($request->all());

        return redirect()->route('admin.drawing-requests.index');
    }

    public function show(DrawingRequest $drawingRequest)
    {
        abort_if(Gate::denies('drawing_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drawingRequest->load('dr_approval', 'project_name', 'project_manager', 'project_coordinator', 'project_group', 'project_building', 'project_area', 'team');

        return view('admin.drawingRequests.show', compact('drawingRequest'));
    }

    public function destroy(DrawingRequest $drawingRequest)
    {
        abort_if(Gate::denies('drawing_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drawingRequest->delete();

        return back();
    }

    public function massDestroy(MassDestroyDrawingRequestRequest $request)
    {
        DrawingRequest::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
