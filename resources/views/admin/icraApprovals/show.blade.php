@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.icraApproval.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.icra-approvals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.icraApproval.fields.id') }}
                        </th>
                        <td>
                            {{ $icraApproval->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icraApproval.fields.name') }}
                        </th>
                        <td>
                            {{ $icraApproval->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.icraApproval.fields.icra_app_dept') }}
                        </th>
                        <td>
                            {{ App\IcraApproval::ICRA_APP_DEPT_SELECT[$icraApproval->icra_app_dept] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.icra-approvals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#icra_approved_by1_icras" role="tab" data-toggle="tab">
                {{ trans('cruds.icra.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#icra_approved_by2_icras" role="tab" data-toggle="tab">
                {{ trans('cruds.icra.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#icra_approved_by3_icras" role="tab" data-toggle="tab">
                {{ trans('cruds.icra.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#icra_approved_by4_icras" role="tab" data-toggle="tab">
                {{ trans('cruds.icra.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="icra_approved_by1_icras">
            @includeIf('admin.icraApprovals.relationships.icraApprovedBy1Icras', ['icras' => $icraApproval->icraApprovedBy1Icras])
        </div>
        <div class="tab-pane" role="tabpanel" id="icra_approved_by2_icras">
            @includeIf('admin.icraApprovals.relationships.icraApprovedBy2Icras', ['icras' => $icraApproval->icraApprovedBy2Icras])
        </div>
        <div class="tab-pane" role="tabpanel" id="icra_approved_by3_icras">
            @includeIf('admin.icraApprovals.relationships.icraApprovedBy3Icras', ['icras' => $icraApproval->icraApprovedBy3Icras])
        </div>
        <div class="tab-pane" role="tabpanel" id="icra_approved_by4_icras">
            @includeIf('admin.icraApprovals.relationships.icraApprovedBy4Icras', ['icras' => $icraApproval->icraApprovedBy4Icras])
        </div>
    </div>
</div>

@endsection