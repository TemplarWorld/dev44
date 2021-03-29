<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySiteIdRequest;
use App\Http\Requests\StoreSiteIdRequest;
use App\Http\Requests\UpdateSiteIdRequest;
use App\SiteId;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SiteIdController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('site_id_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SiteId::with(['team'])->select(sprintf('%s.*', (new SiteId)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'site_id_show';
                $editGate      = 'site_id_edit';
                $deleteGate    = 'site_id_delete';
                $crudRoutePart = 'site-ids';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('site_name', function ($row) {
                return $row->site_name ? $row->site_name : "";
            });
            $table->editColumn('site_address_1', function ($row) {
                return $row->site_address_1 ? $row->site_address_1 : "";
            });
            $table->editColumn('site_address_2', function ($row) {
                return $row->site_address_2 ? $row->site_address_2 : "";
            });
            $table->editColumn('site_city', function ($row) {
                return $row->site_city ? $row->site_city : "";
            });
            $table->editColumn('site_state', function ($row) {
                return $row->site_state ? $row->site_state : "";
            });
            $table->editColumn('site_country', function ($row) {
                return $row->site_country ? $row->site_country : "";
            });
            $table->editColumn('site_telephone', function ($row) {
                return $row->site_telephone ? $row->site_telephone : "";
            });
            $table->editColumn('site_email', function ($row) {
                return $row->site_email ? $row->site_email : "";
            });
            $table->editColumn('site_logo', function ($row) {
                if ($photo = $row->site_logo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'site_logo']);

            return $table->make(true);
        }

        return view('admin.siteIds.index');
    }

    public function create()
    {
        abort_if(Gate::denies('site_id_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.siteIds.create');
    }

    public function store(StoreSiteIdRequest $request)
    {
        $siteId = SiteId::create($request->all());

        if ($request->input('site_logo', false)) {
            $siteId->addMedia(storage_path('tmp/uploads/' . basename($request->input('site_logo'))))->toMediaCollection('site_logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $siteId->id]);
        }

        return redirect()->route('admin.site-ids.index');
    }

    public function edit(SiteId $siteId)
    {
        abort_if(Gate::denies('site_id_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $siteId->load('team');

        return view('admin.siteIds.edit', compact('siteId'));
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

        return redirect()->route('admin.site-ids.index');
    }

    public function show(SiteId $siteId)
    {
        abort_if(Gate::denies('site_id_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $siteId->load('team');

        return view('admin.siteIds.show', compact('siteId'));
    }

    public function destroy(SiteId $siteId)
    {
        abort_if(Gate::denies('site_id_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $siteId->delete();

        return back();
    }

    public function massDestroy(MassDestroySiteIdRequest $request)
    {
        SiteId::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('site_id_create') && Gate::denies('site_id_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SiteId();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
