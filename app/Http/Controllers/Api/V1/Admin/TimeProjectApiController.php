<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTimeProjectRequest;
use App\Http\Requests\UpdateTimeProjectRequest;
use App\Http\Resources\Admin\TimeProjectResource;
use App\TimeProject;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TimeProjectApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('time_project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TimeProjectResource(TimeProject::with(['roles', 'project_coordinator', 'contractor_name', 'contractor_supervisor', 'site_supervisor_tel', 'site_supervisor_email', 'sub_contractors', 'work_type', 'team'])->get());
    }

    public function store(StoreTimeProjectRequest $request)
    {
        $timeProject = TimeProject::create($request->all());
        $timeProject->sub_contractors()->sync($request->input('sub_contractors', []));

        return (new TimeProjectResource($timeProject))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TimeProject $timeProject)
    {
        abort_if(Gate::denies('time_project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TimeProjectResource($timeProject->load(['roles', 'project_coordinator', 'contractor_name', 'contractor_supervisor', 'site_supervisor_tel', 'site_supervisor_email', 'sub_contractors', 'work_type', 'team']));
    }

    public function update(UpdateTimeProjectRequest $request, TimeProject $timeProject)
    {
        $timeProject->update($request->all());
        $timeProject->sub_contractors()->sync($request->input('sub_contractors', []));

        return (new TimeProjectResource($timeProject))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TimeProject $timeProject)
    {
        abort_if(Gate::denies('time_project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timeProject->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
