<?php

Route::get('/', function () {
    return view('index');
});

Auth::routes(['verify' => true]);

Route::prefix('vendor')->group(function() {

    Route::get('/login', 'Vendor\LoginController@showLoginForm')->name('vendor.login');
    Route::post('login', 'Vendor\LoginController@login');

    Route::post('/password/email', 'Vendor\ForgotPasswordController@sendResetLinkEmail')->name('vendor.password.email');
    Route::get('/password/reset', 'Vendor\ForgotPasswordController@showLinkRequestForm')->name('vendor.password.request');
    Route::post('/password/reset', 'Vendor\ResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Vendor\ResetPasswordController@showResetForm')->name('vendor.password.reset');
});

Route::prefix('admin')->group(function() {

    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\LoginController@login');

    Route::post('/password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Admin\ResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
});

Route::get('/approval', 'VendorController@approval')->name('approval');

Route::middleware(['approved'])->group(function() {
    // View vendor dashboard
    Route::get('/vendor/dashboard', 'VendorController@index')->name('vendor.dashboard');
    // Edit vendor profile
    Route::get('/vendor/dashboard/edit/{id}', 'VendorController@edit_profile')->name('vendor.edit');
    // Update existing record in the database
    Route::post('/vendor/dashboard/edit/{id}', 'VendorController@update_profile');

    // View soon-to-wed profile
    Route::get('view/soon-to-wed/{id}', 'VendorController@view_profile')->name('vendor.view');

    Route::get('/report/soon-to-wed/{id}', 'VendorController@report')->name('vendor.report');
    Route::post('/report/soon-to-wed/{id}/submit', 'VendorController@submit_report')->name('vendor.report.submit');

    // View vendor bookings
    Route::get('/vendor/bookings', 'VendorController@requests')->name('vendor.bookings');
    // Accept booking
    Route::get('/vendor/bookings/{id}/accept', 'VendorController@accept')->name('vendor.bookings.accept');
    // Reject booking
    Route::get('/vendor/bookings/{id}/reject', 'VendorController@reject')->name('vendor.bookings.reject');

    // View My Clients
    Route::get('/vendor/clients', 'VendorController@clients')->name('vendor.clients');
    // Edit client notes
    Route::get('/vendor/client/{id}/edit', 'VendorController@edit_client')->name('vendor.edit-client');
    // Update client notes into the database
    Route::post('/vendor/client/{id}/edit', 'VendorController@update_client');
});

Route::middleware(['admin'])->group(function () {
    // View admin dashboard
    Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dashboard');

    // View list of vendors to be approved
    Route::get('/admin/vendors', 'AdminController@vendors')->name('admin.vendors.index');
    // Approve vendor account
    Route::get('/admin/vendors/{vendor_id}/approve', 'AdminController@approve')->name('admin.vendors.approve');
    // Reject vendor account
    Route::get('/admin/vendors/{vendor_id}/reject', 'AdminController@reject')->name('admin.vendors.reject');
});

Route::get('/vendor/register', 'Vendor\RegisterController@showRegistrationForm')->name('vendor.register');
Route::post('/vendor/register', 'Vendor\RegisterController@register');

Route::group(['middleware' => ['web']], function() {
    // View pay to vendor page
    Route::get('/pay/vendor/{id}', 'PaymentController@index')->name('auth.paypal');
    Route::post('/paypal', 'PaymentController@pay');
    Route::get('/status', 'PaymentController@payment_status');

    // View payment page
    Route::get('/payments', 'SoonToWedController@payments')->name('auth.payments');
    // View add payment page
    Route::get('/payments/{id}/add', 'SoonToWedController@add_payment')->name('auth.add-payment');
    // Insert payment transaction into database
    Route::post('/payments/{id}/add', 'SoonToWedController@save_payment');

    // Edit existing payment record
    Route::get('/payments/{id}/edit', 'SoonToWedController@edit_payment')->name('auth.edit-payment');
    // Update record in database
    Route::post('/payments/{id}/edit', 'SoonToWedController@update_payment');

    // View budget tracker page
    Route::get('/budget-tracker', 'SoonToWedController@budget_tracker')->name('auth.budget-tracker');

    // Add new budget
    Route::get('/budget-tracker/{id}/budget/add', 'SoonToWedController@add_budget')->name('auth.add-budget');
    // Insert new budget into the database
    Route::post('/budget-tracker/{id}/budget/add', 'SoonToWedController@save_budget');

    // Edit existing budget
    Route::get('/budget-tracker/{id}/budget/edit', 'SoonToWedController@edit_budget')->name('auth.edit-budget');
    // Update budget into the database
    Route::post('/budget-tracker/{id}/budget/edit', 'SoonToWedController@update_budget');

    // Add new budget item
    Route::get('/budget-tracker/{id}/item', 'SoonToWedController@add_item')->name('auth.add-item');
    // Inserts new budget item into the database
    Route::post('/budget-tracker/{id}/item', 'SoonToWedController@save_item');

    // Edit existing budget item
    Route::get('/budget-tracker/{id}/item/edit', 'SoonToWedController@edit_item')->name('auth.edit-item');
    // Updates budget item into the database
    Route::post('/budget-tracker/{id}/item/edit', 'SoonToWedController@update_item');

    // View guest list manager page
    Route::get('/guestlist', 'SoonToWedController@guestlist')->name('auth.guestlist');

    // View add guest page
    Route::get('/guestlist/{id}/guest', 'SoonToWedController@guest')->name('auth.add-guest');
    // Add record into the database
    Route::post('/guestlist/{id}/guest', 'SoonToWedController@add_guest');

    // Send RSVP to guest
    Route::get('/guestlist/{id}/send', 'SoonToWedController@send');

    // View meals page
    Route::get('/guestlist/{id}/meals', 'SoonToWedController@meals')->name('auth.meals');
    // View add meal type page
    Route::get('/guestlist/{id}/meals/add', 'SoonToWedController@set_meal')->name('auth.add-meal');
    // Add meal type into database
    Route::post('/guestlist/{id}/meals/add', 'SoonToWedController@add_meal');

    // View couple page
    Route::get('/couple-page', 'SoonToWedController@couple_page')->name('auth.couple-page');
    // View create couple page
    Route::get('/couple-page/{id}/create', 'SoonToWedController@create_couple_page')->name('auth.create-page');
    // Insert data into database
    Route::post('/couple-page/{id}/create', 'SoonToWedController@save_couple_page');
    // Edit couple page
    Route::get('/couple-page/{id}/edit', 'SoonToWedController@edit_couple_page')->name('auth.edit-page');
    // Update couple page in the database
    Route::post('/couple-page/{id}/edit', 'SoonToWedController@update_couple_page')->name('auth.edit-page');

    // View a vendor profile
    Route::get('/view/profile/{id}', 'SoonToWedController@view_profile')->name('auth.view');

    // View feedback form
    Route::get('/profile/{id}/feedback', 'SoonToWedController@feedback_form')->name('auth.feedback');
    // Submit feedback form
    Route::post('/profile/{id}/feedback', 'SoonToWedController@submit_feedback');

    // View request form for booking a vendor
    Route::get('/request/profile/{id}', 'SoonToWedController@request')->name('auth.request');
    // Submit booking request form
    Route::post('/request/profile/{id}/book', 'SoonToWedController@book')->name('auth.request.book');
    // View list of booking requests
    Route::get('/booking-requests', 'SoonToWedController@booking_list')->name('auth.booking-requests');

    // Save a vendor to My Vendors
    Route::post('/save/profile/{id}', 'SoonToWedController@save_vendor')->name('auth.view.save');

    // Report a vendor
    Route::get('/report/vendor/{id}', 'SoonToWedController@report_vendor')->name('auth.report');
    // Submit the report as a record in the database
    Route::post('/report/vendor/{id}/submit', 'SoonToWedController@submit_report')->name('auth.report.submit');

    // View list of My Vendors
    Route::get('/my-vendors', 'SoonToWedController@my_vendors')->name('auth.vendors');
    // Remove a vendor from My Vendors
    Route::get('/my-vendors/{vendor_id}/remove', 'SoonToWedController@remove_vendor')->name('auth.vendors.remove');

    // View the soon-to-wed's dashboard
    Route::get('/dashboard', 'SoonToWedController@index');
    // Edit the soon-to-wed profile
    Route::get('/dashboard/edit/{id}', 'SoonToWedController@edit_profile')->name('auth.edit');
    // Update the edited soon-to-wed profile in the database
    Route::post('/dashboard/edit/{id}', 'SoonToWedController@update_profile');
    // Update profile picture
    Route::post('/dashboard', 'SoonToWedController@update_profile_picture');
});

// View RSVP
Route::get('/invitation/{id}/rsvp', 'GuestController@view_rsvp')->name('rsvp');
// Submit RSVP
Route::post('/invitation/{id}/rsvp', 'GuestController@submit_rsvp');

//Route::get('/home', 'AdminController@index')->name('admin.home');

Route::get('/marketplace', 'MarketplaceController@index');