<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIdTagRequest;
use App\Http\Requests\UpdateIdTagRequest;
use App\Http\Resources\Admin\IdTagResource;
use App\IdTag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IdTagsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('id_tag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IdTagResource(IdTag::with(['contractor_company'])->get());
    }

    public function store(StoreIdTagRequest $request)
    {
        $idTag = IdTag::create($request->all());

        return (new IdTagResource($idTag))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(IdTag $idTag)
    {
        abort_if(Gate::denies('id_tag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IdTagResource($idTag->load(['contractor_company']));
    }

    public function update(UpdateIdTagRequest $request, IdTag $idTag)
    {
        $idTag->update($request->all());

        return (new IdTagResource($idTag))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(IdTag $idTag)
    {
        abort_if(Gate::denies('id_tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $idTag->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
