<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Commissioning;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommissioningRequest;
use App\Http\Requests\UpdateCommissioningRequest;
use App\Http\Resources\Admin\CommissioningResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommissioningApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('commissioning_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CommissioningResource(Commissioning::with(['project_name', 'project_manager', 'project_coordinator', 'project_number'])->get());
    }

    public function store(StoreCommissioningRequest $request)
    {
        $commissioning = Commissioning::create($request->all());

        return (new CommissioningResource($commissioning))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Commissioning $commissioning)
    {
        abort_if(Gate::denies('commissioning_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CommissioningResource($commissioning->load(['project_name', 'project_manager', 'project_coordinator', 'project_number']));
    }

    public function update(UpdateCommissioningRequest $request, Commissioning $commissioning)
    {
        $commissioning->update($request->all());

        return (new CommissioningResource($commissioning))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Commissioning $commissioning)
    {
        abort_if(Gate::denies('commissioning_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commissioning->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
