<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInformationRequestRequest;
use App\Http\Requests\UpdateInformationRequestRequest;
use App\Http\Resources\Admin\InformationRequestResource;
use App\InformationRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InformationRequestApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('information_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InformationRequestResource(InformationRequest::with(['project_manager', 'team'])->get());
    }

    public function store(StoreInformationRequestRequest $request)
    {
        $informationRequest = InformationRequest::create($request->all());

        return (new InformationRequestResource($informationRequest))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(InformationRequest $informationRequest)
    {
        abort_if(Gate::denies('information_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InformationRequestResource($informationRequest->load(['project_manager', 'team']));
    }

    public function update(UpdateInformationRequestRequest $request, InformationRequest $informationRequest)
    {
        $informationRequest->update($request->all());

        return (new InformationRequestResource($informationRequest))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(InformationRequest $informationRequest)
    {
        abort_if(Gate::denies('information_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $informationRequest->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
