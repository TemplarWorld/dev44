<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Contact Companies
    Route::delete('contact-companies/destroy', 'ContactCompanyController@massDestroy')->name('contact-companies.massDestroy');
    Route::resource('contact-companies', 'ContactCompanyController');

    // Contact Contacts
    Route::delete('contact-contacts/destroy', 'ContactContactsController@massDestroy')->name('contact-contacts.massDestroy');
    Route::resource('contact-contacts', 'ContactContactsController');

    // Faq Categories
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Questions
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Time Work Types
    Route::delete('time-work-types/destroy', 'TimeWorkTypeController@massDestroy')->name('time-work-types.massDestroy');
    Route::post('time-work-types/parse-csv-import', 'TimeWorkTypeController@parseCsvImport')->name('time-work-types.parseCsvImport');
    Route::post('time-work-types/process-csv-import', 'TimeWorkTypeController@processCsvImport')->name('time-work-types.processCsvImport');
    Route::resource('time-work-types', 'TimeWorkTypeController');

    // Time Projects
    Route::delete('time-projects/destroy', 'TimeProjectController@massDestroy')->name('time-projects.massDestroy');
    Route::post('time-projects/parse-csv-import', 'TimeProjectController@parseCsvImport')->name('time-projects.parseCsvImport');
    Route::post('time-projects/process-csv-import', 'TimeProjectController@processCsvImport')->name('time-projects.processCsvImport');
    Route::resource('time-projects', 'TimeProjectController');

    // Time Entries
    Route::delete('time-entries/destroy', 'TimeEntryController@massDestroy')->name('time-entries.massDestroy');
    Route::resource('time-entries', 'TimeEntryController');

    // Time Reports
    Route::delete('time-reports/destroy', 'TimeReportController@massDestroy')->name('time-reports.massDestroy');
    Route::resource('time-reports', 'TimeReportController');

    // Teams
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Contractors
    Route::delete('contractors/destroy', 'ContractorsController@massDestroy')->name('contractors.massDestroy');
    Route::post('contractors/parse-csv-import', 'ContractorsController@parseCsvImport')->name('contractors.parseCsvImport');
    Route::post('contractors/process-csv-import', 'ContractorsController@processCsvImport')->name('contractors.processCsvImport');
    Route::resource('contractors', 'ContractorsController');

    // Id Tags
    Route::delete('id-tags/destroy', 'IdTagsController@massDestroy')->name('id-tags.massDestroy');
    Route::resource('id-tags', 'IdTagsController');

    // Icras
    Route::delete('icras/destroy', 'IcraController@massDestroy')->name('icras.massDestroy');
    Route::post('icras/parse-csv-import', 'IcraController@parseCsvImport')->name('icras.parseCsvImport');
    Route::post('icras/process-csv-import', 'IcraController@processCsvImport')->name('icras.processCsvImport');
    Route::resource('icras', 'IcraController');

    // Drawing Requests
    Route::delete('drawing-requests/destroy', 'DrawingRequestController@massDestroy')->name('drawing-requests.massDestroy');
    Route::resource('drawing-requests', 'DrawingRequestController');

    // Information Requests
    Route::delete('information-requests/destroy', 'InformationRequestController@massDestroy')->name('information-requests.massDestroy');
    Route::resource('information-requests', 'InformationRequestController');

    // Commissionings
    Route::delete('commissionings/destroy', 'CommissioningController@massDestroy')->name('commissionings.massDestroy');
    Route::resource('commissionings', 'CommissioningController');

    // Approvals
    Route::delete('approvals/destroy', 'ApprovalsController@massDestroy')->name('approvals.massDestroy');
    Route::resource('approvals', 'ApprovalsController');

    // Permitadmins
    Route::delete('permitadmins/destroy', 'PermitadminController@massDestroy')->name('permitadmins.massDestroy');
    Route::post('permitadmins/media', 'PermitadminController@storeMedia')->name('permitadmins.storeMedia');
    Route::post('permitadmins/ckmedia', 'PermitadminController@storeCKEditorImages')->name('permitadmins.storeCKEditorImages');
    Route::post('permitadmins/parse-csv-import', 'PermitadminController@parseCsvImport')->name('permitadmins.parseCsvImport');
    Route::post('permitadmins/process-csv-import', 'PermitadminController@processCsvImport')->name('permitadmins.processCsvImport');
    Route::resource('permitadmins', 'PermitadminController');

    // Icra Approvals
    Route::delete('icra-approvals/destroy', 'IcraApprovalController@massDestroy')->name('icra-approvals.massDestroy');
    Route::resource('icra-approvals', 'IcraApprovalController');

    // Site Ids
    Route::delete('site-ids/destroy', 'SiteIdController@massDestroy')->name('site-ids.massDestroy');
    Route::post('site-ids/media', 'SiteIdController@storeMedia')->name('site-ids.storeMedia');
    Route::post('site-ids/ckmedia', 'SiteIdController@storeCKEditorImages')->name('site-ids.storeCKEditorImages');
    Route::resource('site-ids', 'SiteIdController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    Route::get('team-members', 'TeamMembersController@index')->name('team-members.index');
    Route::post('team-members', 'TeamMembersController@invite')->name('team-members.invite');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
// Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
