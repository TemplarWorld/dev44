<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIcraApprovalRequest;
use App\Http\Requests\UpdateIcraApprovalRequest;
use App\Http\Resources\Admin\IcraApprovalResource;
use App\IcraApproval;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IcraApprovalApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('icra_approval_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IcraApprovalResource(IcraApproval::all());
    }

    public function store(StoreIcraApprovalRequest $request)
    {
        $icraApproval = IcraApproval::create($request->all());

        return (new IcraApprovalResource($icraApproval))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(IcraApproval $icraApproval)
    {
        abort_if(Gate::denies('icra_approval_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IcraApprovalResource($icraApproval);
    }

    public function update(UpdateIcraApprovalRequest $request, IcraApproval $icraApproval)
    {
        $icraApproval->update($request->all());

        return (new IcraApprovalResource($icraApproval))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(IcraApproval $icraApproval)
    {
        abort_if(Gate::denies('icra_approval_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $icraApproval->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
