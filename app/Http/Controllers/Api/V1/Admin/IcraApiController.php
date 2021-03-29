<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIcraRequest;
use App\Http\Requests\UpdateIcraRequest;
use App\Http\Resources\Admin\IcraResource;
use App\Icra;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IcraApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('icra_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IcraResource(Icra::with(['project_name', 'project_number', 'project_manager', 'project_coordinator', 'contractor_name', 'contractor_supervisor', 'site_supervisor_tel', 'project_site', 'project_building', 'project_area', 'work_type', 'project_description', 'icra_approved_by_1', 'icra_approved_by_2', 'icra_approved_by_3', 'icra_approved_by_4', 'team'])->get());
    }

    public function store(StoreIcraRequest $request)
    {
        $icra = Icra::create($request->all());

        return (new IcraResource($icra))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Icra $icra)
    {
        abort_if(Gate::denies('icra_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IcraResource($icra->load(['project_name', 'project_number', 'project_manager', 'project_coordinator', 'contractor_name', 'contractor_supervisor', 'site_supervisor_tel', 'project_site', 'project_building', 'project_area', 'work_type', 'project_description', 'icra_approved_by_1', 'icra_approved_by_2', 'icra_approved_by_3', 'icra_approved_by_4', 'team']));
    }

    public function update(UpdateIcraRequest $request, Icra $icra)
    {
        $icra->update($request->all());

        return (new IcraResource($icra))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Icra $icra)
    {
        abort_if(Gate::denies('icra_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $icra->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
