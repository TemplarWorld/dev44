@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.approval.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.approvals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.approval.fields.id') }}
                        </th>
                        <td>
                            {{ $approval->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approval.fields.permit_approval_name') }}
                        </th>
                        <td>
                            {{ $approval->permit_approval_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approval.fields.permit_approval_department') }}
                        </th>
                        <td>
                            {{ App\Approval::PERMIT_APPROVAL_DEPARTMENT_SELECT[$approval->permit_approval_department] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.approvals.index') }}">
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
            <a class="nav-link" href="#permit_approved_by_permitadmins" role="tab" data-toggle="tab">
                {{ trans('cruds.permitadmin.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#dr_approval_drawing_requests" role="tab" data-toggle="tab">
                {{ trans('cruds.drawingRequest.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="permit_approved_by_permitadmins">
            @includeIf('admin.approvals.relationships.permitApprovedByPermitadmins', ['permitadmins' => $approval->permitApprovedByPermitadmins])
        </div>
        <div class="tab-pane" role="tabpanel" id="dr_approval_drawing_requests">
            @includeIf('admin.approvals.relationships.drApprovalDrawingRequests', ['drawingRequests' => $approval->drApprovalDrawingRequests])
        </div>
    </div>
</div>

@endsection