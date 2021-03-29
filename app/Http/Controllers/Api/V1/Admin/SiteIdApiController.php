<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSiteIdRequest;
use App\Http\Requests\UpdateSiteIdRequest;
use App\Http\Resources\Admin\SiteIdResource;
use App\SiteId;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SiteIdApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('site_id_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SiteIdResource(SiteId::with(['team'])->get());
    }

    public function store(StoreSiteIdRequest $request)
    {
        $siteId = SiteId::create($request->all());

        if ($request->input('site_logo', false)) {
            $siteId->addMedia(storage_path('tmp/uploads/' . basename($request->input('site_logo'))))->toMediaCollection('site_logo');
        }

        return (new SiteIdResource($siteId))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SiteId $siteId)
    {
        abort_if(Gate::denies('site_id_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SiteIdResource($siteId->load(['team']));
    }

    public function update(UpdateSiteIdRequest $request, SiteId $siteId)
    {
        $siteId->update($request->all());

        if ($request->input('site_logo', false)) {
            if (!$siteId->site_logo || $request->input('site_logo') !== $siteId->site_logo->file_name) {
                if ($siteId->site_logo) {
                    $siteId->site_logo->delete();
                }

                $siteId->addMedia(storage_path('tmp/uploads/' . basename($request->input('site_logo'))))->toMediaCollection('site_logo');
            }
        } elseif ($siteId->site_logo) {
            $siteId->site_logo->delete();
        }

        return (new SiteIdResource($siteId))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SiteId $siteId)
    {
        abort_if(Gate::denies('site_id_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $siteId->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
