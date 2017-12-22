<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/reports/patient-report', 'Admin\ReportsController@patientReport');
    Route::get('/reports/employee-report', 'Admin\ReportsController@employeeReport');

    Route::get('/calendar', 'Admin\SystemCalendarController@index'); 

    Route::get('/profile', 'Admin\UsersController@profile');
    // Route::post('/profile', 'Admin\UsersController@update_avatar');
    Route::resource('roles', 'Admin\RolesController');
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::post('users_restore/{id}', ['uses' => 'Admin\UsersController@restore', 'as' => 'users.restore']);
    Route::delete('users_perma_del/{id}', ['uses' => 'Admin\UsersController@perma_del', 'as' => 'users.perma_del']);
    Route::resource('professions', 'Admin\ProfessionsController');
    Route::post('professions_mass_destroy', ['uses' => 'Admin\ProfessionsController@massDestroy', 'as' => 'professions.mass_destroy']);
    Route::post('professions_restore/{id}', ['uses' => 'Admin\ProfessionsController@restore', 'as' => 'professions.restore']);
    Route::delete('professions_perma_del/{id}', ['uses' => 'Admin\ProfessionsController@perma_del', 'as' => 'professions.perma_del']);
    Route::resource('patients', 'Admin\PatientsController');
    Route::post('patients_mass_destroy', ['uses' => 'Admin\PatientsController@massDestroy', 'as' => 'patients.mass_destroy']);
    Route::post('patients_restore/{id}', ['uses' => 'Admin\PatientsController@restore', 'as' => 'patients.restore']);
    Route::delete('patients_perma_del/{id}', ['uses' => 'Admin\PatientsController@perma_del', 'as' => 'patients.perma_del']);
    Route::resource('contact_companies', 'Admin\ContactCompaniesController');
    Route::post('contact_companies_mass_destroy', ['uses' => 'Admin\ContactCompaniesController@massDestroy', 'as' => 'contact_companies.mass_destroy']);
    Route::resource('contacts', 'Admin\ContactsController');
    
    Route::post('contacts_mass_destroy', ['uses' => 'Admin\ContactsController@massDestroy', 'as' => 'contacts.mass_destroy']);
    Route::post('contacts_restore/{id}', ['uses' => 'Admin\ContactsController@restore', 'as' => 'contacts.restore']);
    Route::delete('contacts_perma_del/{id}', ['uses' => 'Admin\ContactsController@perma_del', 'as' => 'contacts.perma_del']);
    Route::resource('schedules', 'Admin\SchedulesController');
    Route::post('schedules_mass_destroy', ['uses' => 'Admin\SchedulesController@massDestroy', 'as' => 'schedules.mass_destroy']);
    Route::post('schedules_restore/{id}', ['uses' => 'Admin\SchedulesController@restore', 'as' => 'schedules.restore']);
    Route::delete('schedules_perma_del/{id}', ['uses' => 'Admin\SchedulesController@perma_del', 'as' => 'schedules.perma_del']);
    Route::resource('user_actions', 'Admin\UserActionsController');

});
