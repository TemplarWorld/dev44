<?php

namespace App\Http\Controllers\Admin;

use App\Contractor;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIdTagRequest;
use App\Http\Requests\StoreIdTagRequest;
use App\Http\Requests\UpdateIdTagRequest;
use App\IdTag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IdTagsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('id_tag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $idTags = IdTag::with(['contractor_company'])->get();

        return view('admin.idTags.index', compact('idTags'));
    }

    public function create()
    {
        abort_if(Gate::denies('id_tag_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contractor_companies = Contractor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.idTags.create', compact('contractor_companies'));
    }

    public function store(StoreIdTagRequest $request)
    {
        $idTag = IdTag::create($request->all());

        return redirect()->route('admin.id-tags.index');
    }

    public function edit(IdTag $idTag)
    {
        abort_if(Gate::denies('id_tag_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contractor_companies = Contractor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $idTag->load('contractor_company');

        return view('admin.idTags.edit', compact('contractor_companies', 'idTag'));
    }

    public function update(UpdateIdTagRequest $request, IdTag $idTag)
    {
        $idTag->update($request->all());

        return redirect()->route('admin.id-tags.index');
    }

    public function show(IdTag $idTag)
    {
        abort_if(Gate::denies('id_tag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $idTag->load('contractor_company', 'siteSupervisorTelTimeProjects', 'contractorSupervisorTimeProjects', 'siteSupervisorEmailTimeProjects', 'isoContractorSupervisorPermitadmins', 'contractorSupervisorIcras', 'siteSupervisorTelIcras');

        return view('admin.idTags.show', compact('idTag'));
    }

    public function destroy(IdTag $idTag)
    {
        abort_if(Gate::denies('id_tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $idTag->delete();

        return back();
    }

    public function massDestroy(MassDestroyIdTagRequest $request)
    {
        IdTag::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
