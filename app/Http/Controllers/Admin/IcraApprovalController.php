<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIcraApprovalRequest;
use App\Http\Requests\StoreIcraApprovalRequest;
use App\Http\Requests\UpdateIcraApprovalRequest;
use App\IcraApproval;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IcraApprovalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('icra_approval_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $icraApprovals = IcraApproval::all();

        return view('admin.icraApprovals.index', compact('icraApprovals'));
    }

    public function create()
    {
        abort_if(Gate::denies('icra_approval_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.icraApprovals.create');
    }

    public function store(StoreIcraApprovalRequest $request)
    {
        $icraApproval = IcraApproval::create($request->all());

        return redirect()->route('admin.icra-approvals.index');
    }

    public function edit(IcraApproval $icraApproval)
    {
        abort_if(Gate::denies('icra_approval_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.icraApprovals.edit', compact('icraApproval'));
    }

    public function update(UpdateIcraApprovalRequest $request, IcraApproval $icraApproval)
    {
        $icraApproval->update($request->all());

        return redirect()->route('admin.icra-approvals.index');
    }

    public function show(IcraApproval $icraApproval)
    {
        abort_if(Gate::denies('icra_approval_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $icraApproval->load('icraApprovedBy1Icras', 'icraApprovedBy2Icras', 'icraApprovedBy3Icras', 'icraApprovedBy4Icras');

        return view('admin.icraApprovals.show', compact('icraApproval'));
    }

    public function destroy(IcraApproval $icraApproval)
    {
        abort_if(Gate::denies('icra_approval_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $icraApproval->delete();

        return back();
    }

    public function massDestroy(MassDestroyIcraApprovalRequest $request)
    {
        IcraApproval::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
