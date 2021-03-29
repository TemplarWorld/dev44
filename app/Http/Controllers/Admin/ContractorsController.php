<?php

namespace App\Http\Controllers\Admin;

use App\Contractor;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyContractorRequest;
use App\Http\Requests\StoreContractorRequest;
use App\Http\Requests\UpdateContractorRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContractorsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('contractor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Contractor::with(['team'])->select(sprintf('%s.*', (new Contractor)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'contractor_show';
                $editGate      = 'contractor_edit';
                $deleteGate    = 'contractor_delete';
                $crudRoutePart = 'contractors';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('contractor_contact', function ($row) {
                return $row->contractor_contact ? $row->contractor_contact : "";
            });
            $table->editColumn('contractor_street_address', function ($row) {
                return $row->contractor_street_address ? $row->contractor_street_address : "";
            });
            $table->editColumn('contractor_city', function ($row) {
                return $row->contractor_city ? $row->contractor_city : "";
            });
            $table->editColumn('contractor_state', function ($row) {
                return $row->contractor_state ? $row->contractor_state : "";
            });
            $table->editColumn('contractor_zip', function ($row) {
                return $row->contractor_zip ? $row->contractor_zip : "";
            });
            $table->editColumn('contractor_email', function ($row) {
                return $row->contractor_email ? $row->contractor_email : "";
            });
            $table->editColumn('contractor_247_tel', function ($row) {
                return $row->contractor_247_tel ? $row->contractor_247_tel : "";
            });
            $table->editColumn('contractor_tel', function ($row) {
                return $row->contractor_tel ? $row->contractor_tel : "";
            });
            $table->editColumn('contractor_tel_2', function ($row) {
                return $row->contractor_tel_2 ? $row->contractor_tel_2 : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.contractors.index');
    }

    public function create()
    {
        abort_if(Gate::denies('contractor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contractors.create');
    }

    public function store(StoreContractorRequest $request)
    {
        $contractor = Contractor::create($request->all());

        return redirect()->route('admin.contractors.index');
    }

    public function edit(Contractor $contractor)
    {
        abort_if(Gate::denies('contractor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contractor->load('team');

        return view('admin.contractors.edit', compact('contractor'));
    }

    public function update(UpdateContractorRequest $request, Contractor $contractor)
    {
        $contractor->update($request->all());

        return redirect()->route('admin.contractors.index');
    }

    public function show(Contractor $contractor)
    {
        abort_if(Gate::denies('contractor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contractor->load('team', 'iso1ContractorPermitadmins', 'contractorNameIcras', 'contractorCompanyIdTags', 'contractorNamePermitadmins', 'subContractorsTimeProjects');

        return view('admin.contractors.show', compact('contractor'));
    }

    public function destroy(Contractor $contractor)
    {
        abort_if(Gate::denies('contractor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contractor->delete();

        return back();
    }

    public function massDestroy(MassDestroyContractorRequest $request)
    {
        Contractor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
