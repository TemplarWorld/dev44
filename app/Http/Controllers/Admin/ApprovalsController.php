<?php

namespace App\Http\Controllers\Admin;

use App\Approval;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyApprovalRequest;
use App\Http\Requests\StoreApprovalRequest;
use App\Http\Requests\UpdateApprovalRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApprovalsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('approval_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $approvals = Approval::all();

        return view('admin.approvals.index', compact('approvals'));
    }

    public function create()
    {
        abort_if(Gate::denies('approval_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.approvals.create');
    }

    public function store(StoreApprovalRequest $request)
    {
        $approval = Approval::create($request->all());

        return redirect()->route('admin.approvals.index');
    }

    public function edit(Approval $approval)
    {
        abort_if(Gate::denies('approval_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.approvals.edit', compact('approval'));
    }

    public function update(UpdateApprovalRequest $request, Approval $approval)
    {
        $approval->update($request->all());

        return redirect()->route('admin.approvals.index');
    }

    public function show(Approval $approval)
    {
        abort_if(Gate::denies('approval_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $approval->load('permitApprovedByPermitadmins', 'drApprovalDrawingRequests');

        return view('admin.approvals.show', compact('approval'));
    }

    public function destroy(Approval $approval)
    {
        abort_if(Gate::denies('approval_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $approval->delete();

        return back();
    }

    public function massDestroy(MassDestroyApprovalRequest $request)
    {
        Approval::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
