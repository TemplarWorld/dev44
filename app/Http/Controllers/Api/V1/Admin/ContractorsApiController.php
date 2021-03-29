<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Contractor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContractorRequest;
use App\Http\Requests\UpdateContractorRequest;
use App\Http\Resources\Admin\ContractorResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContractorsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contractor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContractorResource(Contractor::with(['team'])->get());
    }

    public function store(StoreContractorRequest $request)
    {
        $contractor = Contractor::create($request->all());

        return (new ContractorResource($contractor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Contractor $contractor)
    {
        abort_if(Gate::denies('contractor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContractorResource($contractor->load(['team']));
    }

    public function update(UpdateContractorRequest $request, Contractor $contractor)
    {
        $contractor->update($request->all());

        return (new ContractorResource($contractor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Contractor $contractor)
    {
        abort_if(Gate::denies('contractor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contractor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
