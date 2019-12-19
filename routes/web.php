<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','JobController@index')->name('welcome');

Auth::routes(['verify' => true]);
//Home page
Route::get('/home', 'HomeController@index')->name('home');

//Job page

Route::get('/jobs/{id}/{job}', 'JobController@show')->name('jobs.show');
Route::get('/jobs/create', 'JobController@create')->name('jobs.create');
Route::post('/jobs/store', 'JobController@store')->name('jobs.store');
Route::get('/jobs/my_jobs', 'JobController@my_jobs')->name('jobs.my_jobs');
Route::get('/jobs/edit/{id}/{edit}', 'JobController@edit')->name('jobs.edit');
Route::post('/jobs/update/{id}/{update}', 'JobController@update')->name('jobs.update');
Route::get('/jobs/destroy/{id}/{destroy}', 'JobController@destroy')->name('jobs.destroy');
Route::post('/jobs/apply/{id}', 'JobController@apply')->name('jobs.apply');
Route::get('/jobs/applicants', 'JobController@applicants')->name('jobs.applicants');
Route::get('/jobs/all_jobs', 'JobController@all_jobs')->name('all_jobs');
Route::post('/application/{id}','JobController@apply')->name('apply');

//Search option
Route::get('/jobs/search','JobController@searchJob');

//Save & Unsave Job
Route::post('/save/{id}','FavoriteController@saveJob');
Route::post('/unSave/{id}','FavoriteController@unSaveJob');

//company page
Route::get('/company/{id}/{company}', 'CompanyController@index')->name('company.index');
Route::get('/company/create', 'CompanyController@create')->name('company.create');
Route::post('/company/store', 'CompanyController@store')->name('company.store');
Route::post('/company/logo', 'CompanyController@logo')->name('company.logo');
Route::post('/company/cover_photo', 'CompanyController@cover_photo')->name('company.cover_photo');
Route::get('/company', 'CompanyController@company')->name('company');

//profile page

Route::get('/user/profile', 'UserProfileController@index')->name('user.profile');
Route::post('/profile/store', 'UserProfileController@store')->name('profile.store');
Route::post('/profile/coverletter', 'UserProfileController@coverletter')->name('profile.coverletter');
Route::post('/profile/resume', 'UserProfileController@resume')->name('profile.resume');
Route::post('/profile/avatar', 'UserProfileController@avatar')->name('profile.avatar');

//employer pages

Route::view('/employer/profile','auth.emp-register')->name('employer.registration');
Route::post('/employer/profile/store', 'EmployerProfileController@store')->name('employer.store');


//Category Page

Route::get('/category/{id}','CategoryController@index')->name('category.show');

//Send Mail

Route::post('/email/job','EmailController@send')->name('mail');

//Contact

Route::get('/contact','ContactController@index')->name('contact');
Route::post('/contact/send','ContactController@create')->name('contact.send');
Route::get('/contact/show','ContactController@show');
Route::get('/contact/{id}/destroy','ContactController@destroy')->name('contact.destroy');


//Admin Panel


Route::group(['middleware' =>['auth','admin']],function (){
    Route::get('/admin',function (){

        return view('admin.dashboard');
    });

    Route::get('/registered-role','Admin\DashboardController@registered')->name('admin.registered');
    Route::get('/registered-role/{id}/edit','Admin\DashboardController@edit')->name('registered.edit');
    Route::post('/registered-role/{id}/update','Admin\DashboardController@update')->name('registered.update');
    Route::get('/registered-role/{id}/delete','Admin\DashboardController@delete')->name('registered.delete');
    Route::get('/contactInfo/edit','Admin\ContactInfoController@edit')->name('admin.contactInfo');
    Route::post('/contactInfo/{id}/edit','Admin\ContactInfoController@update')->name('contactInfo.update');
});

