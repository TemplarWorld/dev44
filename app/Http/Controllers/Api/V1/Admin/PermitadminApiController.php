<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePermitadminRequest;
use App\Http\Requests\UpdatePermitadminRequest;
use App\Http\Resources\Admin\PermitadminResource;
use App\Permitadmin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermitadminApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('permitadmin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PermitadminResource(Permitadmin::with(['submitted_by', 'name', 'project_number', 'project_manager', 'project_coordinator', 'contractor_name', 'contractor_supervisor', 'site_supervisor_tel', 'site_supervisor_email', 'team', 'project_site', 'project_building', 'project_area', 'work_type', 'iso_1_contractor', 'iso_contractor_supervisor', 'iso_supervisor_tel', 'iso_supervisor_email', 'permit_approved_by'])->get());
    }

    public function store(StorePermitadminRequest $request)
    {
        $permitadmin = Permitadmin::create($request->all());

        if ($request->input('file_upload', false)) {
            $permitadmin->addMedia(storage_path('tmp/uploads/' . basename($request->input('file_upload'))))->toMediaCollection('file_upload');
        }

        return (new PermitadminResource($permitadmin))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Permitadmin $permitadmin)
    {
        abort_if(Gate::denies('permitadmin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PermitadminResource($permitadmin->load(['submitted_by', 'name', 'project_number', 'project_manager', 'project_coordinator', 'contractor_name', 'contractor_supervisor', 'site_supervisor_tel', 'site_supervisor_email', 'team', 'project_site', 'project_building', 'project_area', 'work_type', 'iso_1_contractor', 'iso_contractor_supervisor', 'iso_supervisor_tel', 'iso_supervisor_email', 'permit_approved_by']));
    }

    public function update(UpdatePermitadminRequest $request, Permitadmin $permitadmin)
    {
        $permitadmin->update($request->all());

        if ($request->input('file_upload', false)) {
            if (!$permitadmin->file_upload || $request->input('file_upload') !== $permitadmin->file_upload->file_name) {
                if ($permitadmin->file_upload) {
                    $permitadmin->file_upload->delete();
                }

                $permitadmin->addMedia(storage_path('tmp/uploads/' . basename($request->input('file_upload'))))->toMediaCollection('file_upload');
            }
        } elseif ($permitadmin->file_upload) {
            $permitadmin->file_upload->delete();
        }

        return (new PermitadminResource($permitadmin))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Permitadmin $permitadmin)
    {
        abort_if(Gate::denies('permitadmin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permitadmin->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
