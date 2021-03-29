<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInformationRequestRequest;
use App\Http\Requests\StoreInformationRequestRequest;
use App\Http\Requests\UpdateInformationRequestRequest;
use App\InformationRequest;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class InformationRequestController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('information_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = InformationRequest::with(['project_manager', 'team'])->select(sprintf('%s.*', (new InformationRequest)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'information_request_show';
                $editGate      = 'information_request_edit';
                $deleteGate    = 'information_request_delete';
                $crudRoutePart = 'information-requests';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });

            $table->editColumn('requested_by', function ($row) {
                return $row->requested_by ? $row->requested_by : "";
            });
            $table->editColumn('info_tel', function ($row) {
                return $row->info_tel ? $row->info_tel : "";
            });
            $table->editColumn('req_email', function ($row) {
                return $row->req_email ? $row->req_email : "";
            });
            $table->editColumn('project_name', function ($row) {
                return $row->project_name ? $row->project_name : "";
            });
            $table->addColumn('project_manager_name', function ($row) {
                return $row->project_manager ? $row->project_manager->name : '';
            });

            $table->editColumn('info_descrip', function ($row) {
                return $row->info_descrip ? $row->info_descrip : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'project_manager']);

            return $table->make(true);
        }

        return view('admin.informationRequests.index');
    }

    public function create()
    {
        abort_if(Gate::denies('information_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project_managers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.informationRequests.create', compact('project_managers'));
    }

    public function store(StoreInformationRequestRequest $request)
    {
        $informationRequest = InformationRequest::create($request->all());

        return redirect()->route('admin.information-requests.index');
    }

    public function edit(InformationRequest $informationRequest)
    {
        abort_if(Gate::denies('information_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project_managers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $informationRequest->load('project_manager', 'team');

        return view('admin.informationRequests.edit', compact('project_managers', 'informationRequest'));
    }

    public function update(UpdateInformationRequestRequest $request, InformationRequest $informationRequest)
    {
        $informationRequest->update($request->all());

        return redirect()->route('admin.information-requests.index');
    }

    public function show(InformationRequest $informationRequest)
    {
        abort_if(Gate::denies('information_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $informationRequest->load('project_manager', 'team');

        return view('admin.informationRequests.show', compact('informationRequest'));
    }

    public function destroy(InformationRequest $informationRequest)
    {
        abort_if(Gate::denies('information_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $informationRequest->delete();

        return back();
    }

    public function massDestroy(MassDestroyInformationRequestRequest $request)
    {
        InformationRequest::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
