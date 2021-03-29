<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\DrawingRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDrawingRequestRequest;
use App\Http\Requests\UpdateDrawingRequestRequest;
use App\Http\Resources\Admin\DrawingRequestResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DrawingRequestApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('drawing_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DrawingRequestResource(DrawingRequest::with(['dr_approval', 'project_name', 'project_manager', 'project_coordinator', 'project_group', 'project_building', 'project_area', 'team'])->get());
    }

    public function store(StoreDrawingRequestRequest $request)
    {
        $drawingRequest = DrawingRequest::create($request->all());

        return (new DrawingRequestResource($drawingRequest))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DrawingRequest $drawingRequest)
    {
        abort_if(Gate::denies('drawing_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DrawingRequestResource($drawingRequest->load(['dr_approval', 'project_name', 'project_manager', 'project_coordinator', 'project_group', 'project_building', 'project_area', 'team']));
    }

    public function update(UpdateDrawingRequestRequest $request, DrawingRequest $drawingRequest)
    {
        $drawingRequest->update($request->all());

        return (new DrawingRequestResource($drawingRequest))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DrawingRequest $drawingRequest)
    {
        abort_if(Gate::denies('drawing_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $drawingRequest->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
