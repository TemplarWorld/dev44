<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Approval;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApprovalRequest;
use App\Http\Requests\UpdateApprovalRequest;
use App\Http\Resources\Admin\ApprovalResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApprovalsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('approval_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApprovalResource(Approval::all());
    }

    public function store(StoreApprovalRequest $request)
    {
        $approval = Approval::create($request->all());

        return (new ApprovalResource($approval))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Approval $approval)
    {
        abort_if(Gate::denies('approval_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApprovalResource($approval);
    }

    public function update(UpdateApprovalRequest $request, Approval $approval)
    {
        $approval->update($request->all());

        return (new ApprovalResource($approval))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Approval $approval)
    {
        abort_if(Gate::denies('approval_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $approval->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
