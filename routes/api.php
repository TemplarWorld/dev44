<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Contact Companies
    Route::apiResource('contact-companies', 'ContactCompanyApiController');

    // Contact Contacts
    Route::apiResource('contact-contacts', 'ContactContactsApiController');

    // Faq Categories
    Route::apiResource('faq-categories', 'FaqCategoryApiController');

    // Faq Questions
    Route::apiResource('faq-questions', 'FaqQuestionApiController');

    // Time Work Types
    Route::apiResource('time-work-types', 'TimeWorkTypeApiController');

    // Time Projects
    Route::apiResource('time-projects', 'TimeProjectApiController');

    // Time Entries
    Route::apiResource('time-entries', 'TimeEntryApiController');

    // Teams
    Route::apiResource('teams', 'TeamApiController');

    // Contractors
    Route::apiResource('contractors', 'ContractorsApiController');

    // Id Tags
    Route::apiResource('id-tags', 'IdTagsApiController');

    // Icras
    Route::apiResource('icras', 'IcraApiController');

    // Drawing Requests
    Route::apiResource('drawing-requests', 'DrawingRequestApiController');

    // Information Requests
    Route::apiResource('information-requests', 'InformationRequestApiController');

    // Commissionings
    Route::apiResource('commissionings', 'CommissioningApiController');

    // Approvals
    Route::apiResource('approvals', 'ApprovalsApiController');

    // Permitadmins
    Route::post('permitadmins/media', 'PermitadminApiController@storeMedia')->name('permitadmins.storeMedia');
    Route::apiResource('permitadmins', 'PermitadminApiController');

    // Icra Approvals
    Route::apiResource('icra-approvals', 'IcraApprovalApiController');

    // Site Ids
    Route::post('site-ids/media', 'SiteIdApiController@storeMedia')->name('site-ids.storeMedia');
    Route::apiResource('site-ids', 'SiteIdApiController');
});
