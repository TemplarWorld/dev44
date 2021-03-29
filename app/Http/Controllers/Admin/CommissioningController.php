<?php

namespace App\Http\Controllers\Admin;

use App\Commissioning;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCommissioningRequest;
use App\Http\Requests\StoreCommissioningRequest;
use App\Http\Requests\UpdateCommissioningRequest;
use App\TimeProject;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommissioningController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('commissioning_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commissionings = Commissioning::with(['project_name', 'project_manager', 'project_coordinator', 'project_number'])->get();

        return view('admin.commissionings.index', compact('commissionings'));
    }

    public function create()
    {
        abort_if(Gate::denies('commissioning_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project_names = TimeProject::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_managers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_coordinators = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_numbers = TimeProject::all()->pluck('project_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.commissionings.create', compact('project_names', 'project_managers', 'project_coordinators', 'project_numbers'));
    }

    public function store(StoreCommissioningRequest $request)
    {
        $commissioning = Commissioning::create($request->all());

        return redirect()->route('admin.commissionings.index');
    }

    public function edit(Commissioning $commissioning)
    {
        abort_if(Gate::denies('commissioning_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project_names = TimeProject::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_managers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_coordinators = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project_numbers = TimeProject::all()->pluck('project_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $commissioning->load('project_name', 'project_manager', 'project_coordinator', 'project_number');

        return view('admin.commissionings.edit', compact('project_names', 'project_managers', 'project_coordinators', 'project_numbers', 'commissioning'));
    }

    public function update(UpdateCommissioningRequest $request, Commissioning $commissioning)
    {
        $commissioning->update($request->all());

        return redirect()->route('admin.commissionings.index');
    }

    public function show(Commissioning $commissioning)
    {
        abort_if(Gate::denies('commissioning_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commissioning->load('project_name', 'project_manager', 'project_coordinator', 'project_number');

        return view('admin.commissionings.show', compact('commissioning'));
    }

    public function destroy(Commissioning $commissioning)
    {
        abort_if(Gate::denies('commissioning_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commissioning->delete();

        return back();
    }

    public function massDestroy(MassDestroyCommissioningRequest $request)
    {
        Commissioning::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
