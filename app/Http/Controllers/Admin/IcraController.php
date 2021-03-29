<?php

namespace App\Http\Controllers\Admin;

use App\Contractor;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyIcraRequest;
use App\Http\Requests\StoreIcraRequest;
use App\Http\Requests\UpdateIcraRequest;
use App\Icra;
use App\IcraApproval;
use App\IdTag;
use App\TimeProject;
use App\TimeWorkType;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class IcraController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('icra_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Icra::with(['project_name', 'project_number', 'project_manager', 'project_coordinator', 'contractor_name', 'contractor_supervisor', 'site_supervisor_tel', 'project_site', 'project_building', 'project_area', 'work_type', 'project_description', 'icra_approved_by_1', 'icra_approved_by_2', 'icra_approved_by_3', 'icra_approved_by_4', 'team'])->select(sprintf('%s.*', (new Icra)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'icra_show';
                $editGate      = 'icra_edit';
                $deleteGate    = 'icra_delete';
                $crudRoutePart = 'icras';

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
            $table->addColumn('project_name_name', function ($row) {
                return $row->project_name ? $row->project_name->name : '';
            });

            $table->addColumn('project_number_project_number', function ($row) {
                return $row->project_number ? $row->project_number->project_number : '';
            });

            $table->addColumn('project_manager_name', function ($row) {
                return $row->project_manager ? $row->project_manager->name : '';
            });

            $table->addColumn('project_coordinator_name', function ($row) {
                return $row->project_coordinator ? $row->project_coordinator->name : '';
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

            $table->addColumn('project_site_site', function ($row) {
                return $row->project_site ? $row->project_site->site : '';
            });

            $table->addColumn('project_building_project_building', function ($row) {
                return $row->project_building ? $row->project_building->project_building : '';
            });

            $table->addColumn('project_area_project_area', function ($row) {
                return $row->project_area ? $row->project_area->project_area : '';
            });

            $table->addColumn('work_type_name', function ($row) {
                return $row->work_type ? $row->work_type->name : '';
            });

            $table->addColumn('project_description_project_description', function ($row) {
                return $row->project_description ? $row->project_description->project_description : '';
            });

            $table->editColumn('icra_program', function ($row) {
                return $row->icra_program ? $row->icra_program : "";
            });

            $table->editColumn('type_a', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->type_a ? 'checked' : null) . '>';
            });
            $table->editColumn('type_b', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->type_b ? 'checked' : null) . '>';
            });
            $table->editColumn('type_c', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->type_c ? 'checked' : null) . '>';
            });
            $table->editColumn('type_d', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->type_d ? 'checked' : null) . '>';
            });
            $table->editColumn('group_1', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->group_1 ? 'checked' : null) . '>';
            });
            $table->editColumn('group_2', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->group_2 ? 'checked' : null) . '>';
            });
            $table->editColumn('group_3', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->group_3 ? 'checked' : null) . '>';
            });
            $table->editColumn('group_4', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->group_4 ? 'checked' : null) . '>';
            });
            $table->editColumn('icra_pmd', function ($row) {
                return $row->icra_pmd ? Icra::ICRA_PMD_SELECT[$row->icra_pmd] : '';
            });
            $table->editColumn('icra_areas_impact_side_a', function ($row) {
                return $row->icra_areas_impact_side_a ? Icra::ICRA_AREAS_IMPACT_SIDE_A_SELECT[$row->icra_areas_impact_side_a] : '';
            });
            $table->editColumn('icra_areas_impact_side_b', function ($row) {
                return $row->icra_areas_impact_side_b ? Icra::ICRA_AREAS_IMPACT_SIDE_B_SELECT[$row->icra_areas_impact_side_b] : '';
            });
            $table->editColumn('icra_areas_impact_side_c', function ($row) {
                return $row->icra_areas_impact_side_c ? Icra::ICRA_AREAS_IMPACT_SIDE_C_SELECT[$row->icra_areas_impact_side_c] : '';
            });
            $table->editColumn('icra_areas_impact_side_d', function ($row) {
                return $row->icra_areas_impact_side_d ? Icra::ICRA_AREAS_IMPACT_SIDE_D_SELECT[$row->icra_areas_impact_side_d] : '';
            });
            $table->editColumn('icra_notes', function ($row) {
                return $row->icra_notes ? $row->icra_notes : "";
            });
            $table->editColumn('icra_hoarding_type', function ($row) {
                return $row->icra_hoarding_type ? Icra::ICRA_HOARDING_TYPE_SELECT[$row->icra_hoarding_type] : '';
            });
            $table->editColumn('icra_ante_pressure', function ($row) {
                return $row->icra_ante_pressure ? $row->icra_ante_pressure : "";
            });
            $table->editColumn('icra_const_area_pressure', function ($row) {
                return $row->icra_const_area_pressure ? $row->icra_const_area_pressure : "";
            });
            $table->editColumn('icra_hepa_unit', function ($row) {
                return $row->icra_hepa_unit ? Icra::ICRA_HEPA_UNIT_SELECT[$row->icra_hepa_unit] : '';
            });
            $table->editColumn('icra_exhaust', function ($row) {
                return $row->icra_exhaust ? Icra::ICRA_EXHAUST_SELECT[$row->icra_exhaust] : '';
            });
            $table->editColumn('icra_pressure_mon', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->icra_pressure_mon ? 'checked' : null) . '>';
            });
            $table->editColumn('icra_additional', function ($row) {
                return $row->icra_additional ? $row->icra_additional : "";
            });
            $table->editColumn('icra_requested_by', function ($row) {
                return $row->icra_requested_by ? $row->icra_requested_by : "";
            });
            $table->addColumn('icra_approved_by_1_name', function ($row) {
                return $row->icra_approved_by_1 ? $row->icra_approved_by_1->name : '';
            });

            $table->editColumn('icra_approved_by_1.icra_app_dept', function ($row) {
                return $row->icra_approved_by_1 ? (is_string($row->icra_approved_by_1) ? $row->icra_approved_by_1 : $row->icra_approved_by_1->icra_app_dept) : '';
            });
            $table->addColumn('icra_approved_by_2_name', function ($row) {
                return $row->icra_approved_by_2 ? $row->icra_approved_by_2->name : '';
            });

            $table->addColumn('icra_approved_by_3_name', function ($row) {
                return $row->icra_approved_by_3 ? $row->icra_approved_by_3->name : '';
            });

            $table->addColumn('icra_approved_by_4_name', function ($row) {
                return $row->icra_approved_by_4 ? $row->icra_approved_by_4->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'project_name', 'project_number', 'project_manager', 'project_coordinator', 'contractor_name', 'contractor_supervisor', 'site_supervisor_tel', 'project_site', 'project_building', 'project_area', 'work_type', 'project_description', 'type_a', 'type_b', 'type_c', 'type_d', 'group_1', 'group_2', 'group_3', 'group_4', 'icra_pressure_mon', 'icra_approved_by_1', 'icra_approved_by_2', 'icra_approved_by_3', 'icra_approved_by_4']);

            return $table->make(true);
        }

        return view('admin.icras.index');
    }

    public function create()
    {
        abort_if(Gate::denies('icra_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project_names = TimeProject::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_numbers = TimeProject::all()->pluck('project_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_managers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_coordinators = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contractor_names = Contractor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contractor_supervisors = IdTag::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $site_supervisor_tels = IdTag::all()->pluck('ic_tel', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_sites = TimeProject::all()->pluck('site', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_buildings = TimeProject::all()->pluck('project_building', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_areas = TimeProject::all()->pluck('project_area', 'id')->prepend(trans('global.pleaseSelect'), '');

        $work_types = TimeWorkType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_descriptions = TimeProject::all()->pluck('project_description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $icra_approved_by_1s = IcraApproval::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $icra_approved_by_2s = IcraApproval::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $icra_approved_by_3s = IcraApproval::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $icra_approved_by_4s = IcraApproval::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.icras.create', compact('project_names', 'project_numbers', 'project_managers', 'project_coordinators', 'contractor_names', 'contractor_supervisors', 'site_supervisor_tels', 'project_sites', 'project_buildings', 'project_areas', 'work_types', 'project_descriptions', 'icra_approved_by_1s', 'icra_approved_by_2s', 'icra_approved_by_3s', 'icra_approved_by_4s'));
    }

    public function store(StoreIcraRequest $request)
    {
        $icra = Icra::create($request->all());

        return redirect()->route('admin.icras.index');
    }

    public function edit(Icra $icra)
    {
        abort_if(Gate::denies('icra_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project_names = TimeProject::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_numbers = TimeProject::all()->pluck('project_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_managers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_coordinators = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contractor_names = Contractor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contractor_supervisors = IdTag::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $site_supervisor_tels = IdTag::all()->pluck('ic_tel', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_sites = TimeProject::all()->pluck('site', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_buildings = TimeProject::all()->pluck('project_building', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_areas = TimeProject::all()->pluck('project_area', 'id')->prepend(trans('global.pleaseSelect'), '');

        $work_types = TimeWorkType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_descriptions = TimeProject::all()->pluck('project_description', 'id')->prepend(trans('global.pleaseSelect'), '');

        $icra_approved_by_1s = IcraApproval::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $icra_approved_by_2s = IcraApproval::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $icra_approved_by_3s = IcraApproval::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $icra_approved_by_4s = IcraApproval::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $icra->load('project_name', 'project_number', 'project_manager', 'project_coordinator', 'contractor_name', 'contractor_supervisor', 'site_supervisor_tel', 'project_site', 'project_building', 'project_area', 'work_type', 'project_description', 'icra_approved_by_1', 'icra_approved_by_2', 'icra_approved_by_3', 'icra_approved_by_4', 'team');

        return view('admin.icras.edit', compact('project_names', 'project_numbers', 'project_managers', 'project_coordinators', 'contractor_names', 'contractor_supervisors', 'site_supervisor_tels', 'project_sites', 'project_buildings', 'project_areas', 'work_types', 'project_descriptions', 'icra_approved_by_1s', 'icra_approved_by_2s', 'icra_approved_by_3s', 'icra_approved_by_4s', 'icra'));
    }

    public function update(UpdateIcraRequest $request, Icra $icra)
    {
        $icra->update($request->all());

        return redirect()->route('admin.icras.index');
    }

    public function show(Icra $icra)
    {
        abort_if(Gate::denies('icra_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $icra->load('project_name', 'project_number', 'project_manager', 'project_coordinator', 'contractor_name', 'contractor_supervisor', 'site_supervisor_tel', 'project_site', 'project_building', 'project_area', 'work_type', 'project_description', 'icra_approved_by_1', 'icra_approved_by_2', 'icra_approved_by_3', 'icra_approved_by_4', 'team');

        return view('admin.icras.show', compact('icra'));
    }

    public function destroy(Icra $icra)
    {
        abort_if(Gate::denies('icra_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $icra->delete();

        return back();
    }

    public function massDestroy(MassDestroyIcraRequest $request)
    {
        Icra::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
