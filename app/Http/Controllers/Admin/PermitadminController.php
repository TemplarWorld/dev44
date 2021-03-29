<?php

namespace App\Http\Controllers\Admin;

use App\Approval;
use App\Contractor;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPermitadminRequest;
use App\Http\Requests\StorePermitadminRequest;
use App\Http\Requests\UpdatePermitadminRequest;
use App\IdTag;
use App\Permitadmin;
use App\TimeProject;
use App\TimeWorkType;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PermitadminController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('permitadmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Permitadmin::with(['submitted_by', 'name', 'project_number', 'project_manager', 'project_coordinator', 'contractor_name', 'contractor_supervisor', 'site_supervisor_tel', 'site_supervisor_email', 'team', 'project_site', 'project_building', 'project_area', 'work_type', 'iso_1_contractor', 'iso_contractor_supervisor', 'iso_supervisor_tel', 'iso_supervisor_email', 'permit_approved_by'])->select(sprintf('%s.*', (new Permitadmin)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'permitadmin_show';
                $editGate      = 'permitadmin_edit';
                $deleteGate    = 'permitadmin_delete';
                $crudRoutePart = 'permitadmins';

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
            $table->addColumn('submitted_by_name', function ($row) {
                return $row->submitted_by ? $row->submitted_by->name : '';
            });

            $table->editColumn('permit_approval', function ($row) {
                return $row->permit_approval ? Permitadmin::PERMIT_APPROVAL_SELECT[$row->permit_approval] : '';
            });
            $table->editColumn('workorder_1', function ($row) {
                return $row->workorder_1 ? $row->workorder_1 : "";
            });
            $table->editColumn('workorder_2', function ($row) {
                return $row->workorder_2 ? $row->workorder_2 : "";
            });
            $table->addColumn('name_name', function ($row) {
                return $row->name ? $row->name->name : '';
            });

            $table->addColumn('project_number_project_number', function ($row) {
                return $row->project_number ? $row->project_number->project_number : '';
            });

            $table->editColumn('project_number.name', function ($row) {
                return $row->project_number ? (is_string($row->project_number) ? $row->project_number : $row->project_number->name) : '';
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

            $table->addColumn('site_supervisor_email_email', function ($row) {
                return $row->site_supervisor_email ? $row->site_supervisor_email->email : '';
            });

            $table->addColumn('project_site_site', function ($row) {
                return $row->project_site ? $row->project_site->site : '';
            });

            $table->editColumn('project_site.project_area', function ($row) {
                return $row->project_site ? (is_string($row->project_site) ? $row->project_site : $row->project_site->project_area) : '';
            });
            $table->addColumn('project_building_project_building', function ($row) {
                return $row->project_building ? $row->project_building->project_building : '';
            });

            $table->addColumn('project_area_project_area', function ($row) {
                return $row->project_area ? $row->project_area->project_area : '';
            });

            $table->editColumn('project_area.project_area', function ($row) {
                return $row->project_area ? (is_string($row->project_area) ? $row->project_area : $row->project_area->project_area) : '';
            });
            $table->addColumn('work_type_name', function ($row) {
                return $row->work_type ? $row->work_type->name : '';
            });

            $table->editColumn('permit_description', function ($row) {
                return $row->permit_description ? $row->permit_description : "";
            });

            $table->editColumn('system_isolation_1', function ($row) {
                return $row->system_isolation_1 ? Permitadmin::SYSTEM_ISOLATION_1_SELECT[$row->system_isolation_1] : '';
            });

            $table->editColumn('start_time_iso_1', function ($row) {
                return $row->start_time_iso_1 ? $row->start_time_iso_1 : "";
            });
            $table->editColumn('end_time_iso_1', function ($row) {
                return $row->end_time_iso_1 ? $row->end_time_iso_1 : "";
            });
            $table->editColumn('system_iso_1_description', function ($row) {
                return $row->system_iso_1_description ? $row->system_iso_1_description : "";
            });
            $table->addColumn('iso_1_contractor_name', function ($row) {
                return $row->iso_1_contractor ? $row->iso_1_contractor->name : '';
            });

            $table->editColumn('iso_1_contractor.contractor_contact', function ($row) {
                return $row->iso_1_contractor ? (is_string($row->iso_1_contractor) ? $row->iso_1_contractor : $row->iso_1_contractor->contractor_contact) : '';
            });
            $table->addColumn('iso_contractor_supervisor_name', function ($row) {
                return $row->iso_contractor_supervisor ? $row->iso_contractor_supervisor->name : '';
            });

            $table->addColumn('iso_supervisor_tel_ic_tel', function ($row) {
                return $row->iso_supervisor_tel ? $row->iso_supervisor_tel->ic_tel : '';
            });

            $table->addColumn('iso_supervisor_email_email', function ($row) {
                return $row->iso_supervisor_email ? $row->iso_supervisor_email->email : '';
            });

            $table->editColumn('file_upload', function ($row) {
                if (!$row->file_upload) {
                    return '';
                }

                $links = [];

                foreach ($row->file_upload as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });
            $table->editColumn('related_permit', function ($row) {
                return $row->related_permit ? $row->related_permit : "";
            });
            $table->editColumn('hot_work_req', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->hot_work_req ? 'checked' : null) . '>';
            });
            $table->editColumn('icra_req', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->icra_req ? 'checked' : null) . '>';
            });
            $table->editColumn('hoarding_req', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->hoarding_req ? 'checked' : null) . '>';
            });
            $table->editColumn('area_hazard', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->area_hazard ? 'checked' : null) . '>';
            });
            $table->editColumn('welding_brazing_silfoss', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->welding_brazing_silfoss ? 'checked' : null) . '>';
            });
            $table->editColumn('type_of_abatement', function ($row) {
                return $row->type_of_abatement ? $row->type_of_abatement : "";
            });
            $table->editColumn('jha_swp', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->jha_swp ? 'checked' : null) . '>';
            });
            $table->editColumn('fall_protection_plan', function ($row) {
                return $row->fall_protection_plan ? Permitadmin::FALL_PROTECTION_PLAN_SELECT[$row->fall_protection_plan] : '';
            });
            $table->editColumn('confined_space_entry_plan', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->confined_space_entry_plan ? 'checked' : null) . '>';
            });
            $table->editColumn('mold_removal_plan', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->mold_removal_plan ? 'checked' : null) . '>';
            });
            $table->editColumn('site_conditions', function ($row) {
                return $row->site_conditions ? $row->site_conditions : "";
            });
            $table->editColumn('additional_information', function ($row) {
                return $row->additional_information ? $row->additional_information : "";
            });
            $table->addColumn('permit_approved_by_permit_approval_name', function ($row) {
                return $row->permit_approved_by ? $row->permit_approved_by->permit_approval_name : '';
            });

            $table->editColumn('permit_approved_by.permit_approval_department', function ($row) {
                return $row->permit_approved_by ? (is_string($row->permit_approved_by) ? $row->permit_approved_by : $row->permit_approved_by->permit_approval_department) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'submitted_by', 'name', 'project_number', 'project_manager', 'project_coordinator', 'contractor_name', 'contractor_supervisor', 'site_supervisor_tel', 'site_supervisor_email', 'project_site', 'project_building', 'project_area', 'work_type', 'iso_1_contractor', 'iso_contractor_supervisor', 'iso_supervisor_tel', 'iso_supervisor_email', 'file_upload', 'hot_work_req', 'icra_req', 'hoarding_req', 'area_hazard', 'welding_brazing_silfoss', 'jha_swp', 'confined_space_entry_plan', 'mold_removal_plan', 'permit_approved_by']);

            return $table->make(true);
        }

        return view('admin.permitadmins.index');
    }

    public function create()
    {
        abort_if(Gate::denies('permitadmin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $submitted_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $names = TimeProject::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_numbers = TimeProject::all()->pluck('project_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_managers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_coordinators = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contractor_names = Contractor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contractor_supervisors = IdTag::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $site_supervisor_tels = IdTag::all()->pluck('ic_tel', 'id')->prepend(trans('global.pleaseSelect'), '');

        $site_supervisor_emails = IdTag::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_sites = TimeProject::all()->pluck('site', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_buildings = TimeProject::all()->pluck('project_building', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_areas = TimeProject::all()->pluck('project_area', 'id')->prepend(trans('global.pleaseSelect'), '');

        $work_types = TimeWorkType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $iso_1_contractors = Contractor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $iso_contractor_supervisors = IdTag::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $iso_supervisor_tels = IdTag::all()->pluck('ic_tel', 'id')->prepend(trans('global.pleaseSelect'), '');

        $iso_supervisor_emails = IdTag::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permit_approved_bies = Approval::all()->pluck('permit_approval_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.permitadmins.create', compact('submitted_bies', 'names', 'project_numbers', 'project_managers', 'project_coordinators', 'contractor_names', 'contractor_supervisors', 'site_supervisor_tels', 'site_supervisor_emails', 'project_sites', 'project_buildings', 'project_areas', 'work_types', 'iso_1_contractors', 'iso_contractor_supervisors', 'iso_supervisor_tels', 'iso_supervisor_emails', 'permit_approved_bies'));
    }

    public function store(StorePermitadminRequest $request)
    {
        $permitadmin = Permitadmin::create($request->all());

        foreach ($request->input('file_upload', []) as $file) {
            $permitadmin->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file_upload');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $permitadmin->id]);
        }

        return redirect()->route('admin.permitadmins.index');
    }

    public function edit(Permitadmin $permitadmin)
    {
        abort_if(Gate::denies('permitadmin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $submitted_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $names = TimeProject::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_numbers = TimeProject::all()->pluck('project_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_managers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_coordinators = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contractor_names = Contractor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contractor_supervisors = IdTag::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $site_supervisor_tels = IdTag::all()->pluck('ic_tel', 'id')->prepend(trans('global.pleaseSelect'), '');

        $site_supervisor_emails = IdTag::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_sites = TimeProject::all()->pluck('site', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_buildings = TimeProject::all()->pluck('project_building', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_areas = TimeProject::all()->pluck('project_area', 'id')->prepend(trans('global.pleaseSelect'), '');

        $work_types = TimeWorkType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $iso_1_contractors = Contractor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $iso_contractor_supervisors = IdTag::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $iso_supervisor_tels = IdTag::all()->pluck('ic_tel', 'id')->prepend(trans('global.pleaseSelect'), '');

        $iso_supervisor_emails = IdTag::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permit_approved_bies = Approval::all()->pluck('permit_approval_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $permitadmin->load('submitted_by', 'name', 'project_number', 'project_manager', 'project_coordinator', 'contractor_name', 'contractor_supervisor', 'site_supervisor_tel', 'site_supervisor_email', 'team', 'project_site', 'project_building', 'project_area', 'work_type', 'iso_1_contractor', 'iso_contractor_supervisor', 'iso_supervisor_tel', 'iso_supervisor_email', 'permit_approved_by');

        return view('admin.permitadmins.edit', compact('submitted_bies', 'names', 'project_numbers', 'project_managers', 'project_coordinators', 'contractor_names', 'contractor_supervisors', 'site_supervisor_tels', 'site_supervisor_emails', 'project_sites', 'project_buildings', 'project_areas', 'work_types', 'iso_1_contractors', 'iso_contractor_supervisors', 'iso_supervisor_tels', 'iso_supervisor_emails', 'permit_approved_bies', 'permitadmin'));
    }

    public function update(UpdatePermitadminRequest $request, Permitadmin $permitadmin)
    {
        $permitadmin->update($request->all());

        if (count($permitadmin->file_upload) > 0) {
            foreach ($permitadmin->file_upload as $media) {
                if (!in_array($media->file_name, $request->input('file_upload', []))) {
                    $media->delete();
                }
            }
        }

        $media = $permitadmin->file_upload->pluck('file_name')->toArray();

        foreach ($request->input('file_upload', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $permitadmin->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file_upload');
            }
        }

        return redirect()->route('admin.permitadmins.index');
    }

    public function show(Permitadmin $permitadmin)
    {
        abort_if(Gate::denies('permitadmin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permitadmin->load('submitted_by', 'name', 'project_number', 'project_manager', 'project_coordinator', 'contractor_name', 'contractor_supervisor', 'site_supervisor_tel', 'site_supervisor_email', 'team', 'project_site', 'project_building', 'project_area', 'work_type', 'iso_1_contractor', 'iso_contractor_supervisor', 'iso_supervisor_tel', 'iso_supervisor_email', 'permit_approved_by');

        return view('admin.permitadmins.show', compact('permitadmin'));
    }

    public function destroy(Permitadmin $permitadmin)
    {
        abort_if(Gate::denies('permitadmin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permitadmin->delete();

        return back();
    }

    public function massDestroy(MassDestroyPermitadminRequest $request)
    {
        Permitadmin::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('permitadmin_create') && Gate::denies('permitadmin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Permitadmin();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
