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

// ------------------------------------------------------------ 
// ------------------------------------------------------------ Alumni Landing Page
// ------------------------------------------------------------ 

Route::group(['as'=>'alumnihome.'], function() {

	Route::get('/', function () {
	    return view('home.alumni-index');
	})->name('index');

	Route::get('/about-us', function () {
	    return view('home.alumni-aboutus');
	})->name('aboutus');

	Route::get('/event', function () {
	    return view('home.alumni-event');
	})->name('event');

	Route::get('/contact-us', function () {
	    return view('home.alumni-contactus');
	})->name('contactus');

});

// ------------------------------------------------------------ 
// ------------------------------------------------------------ Employer Landing Page
// ------------------------------------------------------------ 

Route::group(['prefix'=>'employer', 'as'=>'employerhome.'], function() {

	Route::get('/index', function () {
	    return view('home.employer-index');
	})->name('index');

	Route::get('/features', function () {
	    return view('home.employer-features');
	})->name('features');

	Route::get('/job-board', function () {
	    return view('home.employer-jobboard');
	})->name('jobboard');

	Route::get('/faqs', function () {
	    return view('home.employer-faqs');
	})->name('faqs');
});

// ------------------------------------------------------------
// ------------------------------------------------------------ Alumni
// ------------------------------------------------------------

// ------------------------------ Login

Auth::routes();

// ------------------------------ Index (Dashboard)

Route::get('/index', [
	'as'=>'alumnidashboard',
	'uses'=>'AlumniController@index'
])->middleware(['alumni', 'auth']);


// ------------------------------ Profile

Route::group(['prefix'=>'a/profile', 'as'=>'alumniprofile.', 'middleware'=>['alumni', 'auth']], function () {
	
	// -------------------- General

	// View Profile
	Route::get('/', [
		'as'=>'view',
		'uses'=>'AlumniController@viewprofile'
	]);

    // View Edit Profile (For New Register User)
	Route::get('/edit', [
		'as'=>'edit',
		'uses'=>'AlumniController@editprofile'
	]);

    // Update Profile (For New Register User)
	Route::post('/update', [
		'as'=>'update',
		'uses'=>'AlumniController@updateprofile'
	]);

	// -------------------- Personal Info

	// View Edit Personal Info
	Route::get('/edit/personal-info', [
		'as'=>'edit.info', 
		'uses'=>'AlumniController@editinfo'
	]);

	// Update Personal Info
	Route::post('/update/personal-info', [
		'as'=>'update.info', 
		'uses'=>'AlumniController@updateinfo'
	]);

	// -------------------- About Me

	// View Edit About Me
	Route::get('/edit/about-me', [
		'as'=>'edit.about', 
		'uses'=>'AlumniController@editabout'
	]);

	// Update About Me
	Route::post('/update/about-me', [
		'as'=>'update.about', 
		'uses'=>'AlumniController@updateabout'
	]);

	// -------------------- Working Experience

	// View Working Experience
	Route::get('/edit/working-experience', [
		'as'=>'view.work', 
		'uses'=>'AlumniController@viewwork'
	]);

	// View Add Working Experience
	Route::get('/add/working-experience', [
		'as'=>'add.work', 
		'uses'=>'AlumniController@addwork'
	]);

	// Save Working Experience
	Route::post('/save/working-experience', [
		'as'=>'save.work', 
		'uses'=>'AlumniController@savework'
	]);

	// View Edit Working Experience
	Route::get('/edit/working-experience/{id}', [
		'as'=>'edit.work', 
		'uses'=>'AlumniController@editwork'
	]);

	// Update Working Experience
	Route::post('/update/working-experience', [
		'as'=>'update.work', 
		'uses'=>'AlumniController@updatework'
	]);

	// Delete Working Experience
	Route::get('/delete/working-experience/{id}', [
		'as'=>'delete.work', 
		'uses'=>'AlumniController@deletework'
	]);

	// -------------------- Education

	// View Education
	Route::get('/edit/education', [
		'as'=>'view.edu', 
		'uses'=>'AlumniController@viewedu'
	]);

	// View Add Education
	Route::get('/add/education', [
		'as'=>'add.edu', 
		'uses'=>'AlumniController@addedu'
	]);

	// Save Education
	Route::post('/save/education', [
		'as' =>'save.edu',
		'uses' =>'AlumniController@saveedu',
	]);

	// View Edit Education
	Route::get('/edit/education/{id}', [
		'as'=>'edit.edu', 
		'uses'=>'AlumniController@editedu'
	]);

	// Update Education
	Route::post('/update/education', [
		'as' =>'update.edu',
		'uses' =>'AlumniController@updateedu'
	]);

	// Delete Education
	Route::get('/delete/education/{id}', [
		'as'=>'delete.edu', 
		'uses'=>'AlumniController@deleteedu'
	]);

	// -------------------- Skills

	// View Skills
	Route::get('/edit/skills-and-expertise', [
		'as'=>'view.skills', 
		'uses'=>'AlumniController@viewskill'
	]);

	// View Add Skills
	Route::get('/add/skills-and-expertise', [
		'as'=>'add.skills', 
		'uses'=>'AlumniController@addskill'
	]);

	// Save Skills
	Route::post('/save/skills-and-expertise', [
		'as'=>'save.skills', 
		'uses'=>'AlumniController@saveskill'
	]);

	// View Edit Skills
	Route::get('/edit/skills-and-expertise/{id}', [
		'as'=>'edit.skills', 
		'uses'=>'AlumniController@editskill'
	]);

	// Update Skills
	Route::post('/update/skills-and-expertise', [
		'as'=>'update.skills', 
		'uses'=>'AlumniController@updateskill'
	]);

	// Delete Skills
	Route::get('/delete/skills-and-expertise/{id}', [
		'as' =>'delete.skills',
		'uses'=>'AlumniController@deleteskill'
	]);

	// -------------------- Language

	// View Language
	Route::get('/edit/language', [
		'as'=>'view.lang', 
		'uses'=>'AlumniController@viewlang'
	]);

	// View Add Language
	Route::get('/add/language', [
		'as'=>'add.lang', 
		'uses'=>'AlumniController@addlang'
	]);

	// Save Language
	Route::post('/save/language', [
		'as'=>'save.lang', 
		'uses'=>'AlumniController@savelang'
	]);

	// View Edit Language
	Route::get('/edit/language/{id}', [
		'as'=>'edit.lang', 
		'uses'=>'AlumniController@editlang'
	]);

	// Update Language
	Route::post('/update/language', [
		'as'=>'update.lang', 
		'uses'=>'AlumniController@updatelang'
	]);

	// Delete Language
	Route::get('/delete/language/{id}', [
		'as'=>'delete.lang', 
		'uses'=>'AlumniController@deletelang'
	]);

});


// ------------------------------ Setting

Route::group(['prefix'=>'a/setting', 'as'=>'alumnisetting.', 'middleware'=>['alumni', 'auth']], function () {

	// View Setting
	Route::get('/', ['as'=>'view', 'uses'=>'AlumniController@viewsetting']);

	// View Edit Setting
	Route::get('/edit', ['as'=>'edit', 'uses'=>'AlumniController@editsetting']);

	// Update Setting
	Route::post('/edit', ['as'=>'update', 'uses'=>'AlumniController@updatesetting']);

	// View Edit Password
	Route::get('/change-password', ['as'=>'changepassword', 'uses'=>'AlumniController@editpassword']);

	// Update Password
	Route::post('/change-password', ['as'=>'updatepassword', 'uses'=>'AlumniController@updatepassword']);

});


// ------------------------------------------------------------
// ------------------------------------------------------------ Employer
// ------------------------------------------------------------

// ------------------------------ Login / Register

Route::group(['prefix'=>'e', 'as'=>'employer.', 'middleware'=>['guest']], function() {

	Route::get('/login', function () {
	    return view('auth.employer-login');
	})->name('login');

	Route::get('/register', function () {
	    return view('auth.employer-register');
	})->name('register');

	Route::get('/password/request', function () {
	    return view('auth.passwords.employer-email');
	})->name('password.request');

	Route::get('/password/reset', function () {
	    return view('auth.passwords.employer-reset');
	})->name('password.reset');

	//admin password reset routes
    // Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail_e')->name('password.email');
    // Route::post('/password/reset','ResetPasswordController@reset_e');
    // Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm_e')->name('password.request');
    // Route::get('/password/reset/{token}','ResetPasswordController@showResetForm_e')->name('password.reset');
      

});

// ------------------------------ Index (Dashboard)

Route::get('/dashboard', ['as'=>'employerdashboard', 'uses'=>'EmployerController@index'])->middleware(['employer', 'auth']);

Route::post('/ajaxJob', ['as'=>'ajaxJob', 'uses'=>'EmployerController@ajaxJob'])->middleware(['employer', 'auth']);

// Route::get('/dashboard/{tab}', ['as'=>'employerdashboard', 'uses'=>'EmployerController@index'])->middleware(['employer', 'auth']);

// ------------------------------ Profile

Route::group(['prefix'=>'e/profile', 'as'=>'employerprofile.', 'middleware'=>['employer', 'auth']], function () {
	
	// -------------------- General

	// View Profile
	Route::get('/', ['as'=>'view', 'uses'=>'EmployerController@viewprofile']);

    // View Edit Profile (For New Register User)
	Route::get('/edit', ['as'=>'edit', 'uses'=>'EmployerController@editprofile']);

	// Update Profile
	Route::post('/update', ['as'=>'update', 'uses'=>'EmployerController@updateprofile']);
});


// ------------------------------ Setting

Route::group(['prefix'=>'e/setting', 'as'=>'employersetting.', 'middleware'=>['employer', 'auth']], function () {

	// View Setting
	Route::get('/', ['as'=>'view', 'uses'=>'EmployerController@viewsetting']);

	// View Edit Setting
	Route::get('/edit', ['as'=>'edit', 'uses'=>'EmployerController@editsetting']);

	// Update Setting
	Route::post('/edit', ['as'=>'update', 'uses'=>'EmployerController@updatesetting']);

	// View Edit Password
	Route::get('/change-password', ['as'=>'changepassword', 'uses'=>'EmployerController@editpassword']);

	// Update Password
	Route::post('/change-password', ['as'=>'updatepassword', 'uses'=>'EmployerController@updatepassword']);
});


// ------------------------------------------------------------
// ------------------------------------------------------------ Job
// ------------------------------------------------------------

Route::group(['prefix'=>'job', 'as'=>'job.', 'middleware'=>'auth'], function () {

	// For Employer

	Route::get('/post', ['as'=>'post', 'uses'=>'JobController@postjob'])->middleware('employer');

	Route::post('/save', ['as'=>'save', 'uses'=>'JobController@savejob'])->middleware('employer');

	Route::get('/edit/{id}', ['as'=>'edit', 'uses'=>'JobController@editjob'])->middleware('employer');

	Route::post('/update', ['as'=>'update', 'uses'=>'JobController@updatejob'])->middleware('employer');

	Route::get('/overview/{id}', ['as'=>'overview', 'uses'=>'JobController@overview'])->middleware('employer');

	// View

	Route::get('/view/{id}', ['as'=>'view', 'uses'=>'JobController@viewjob']);

	Route::get('/apply/{id}', ['as'=>'apply', 'uses'=>'JobController@applyjob'])->middleware('alumni');

});

Route::group(['prefix'=>'job', 'as'=>'job.'], function () {

	Route::get('/top', ['as'=>'top', 'uses'=>'JobController@viewtopjob']);

	Route::get('/categories', ['as'=>'categories', 'uses'=>'JobController@viewcategoriesjob']);

});

// ------------------------------------------------------------
// ------------------------------------------------------------ Companies
// ------------------------------------------------------------

Route::group(['prefix'=>'company', 'as'=>'company.', 'middleware'=>['auth', 'employer']], function () {


	// For Employer

	Route::get('/profile/view', ['as'=>'view', 'uses'=>'CompanyController@view']);

	Route::get('/profile/add', ['as'=>'add', 'uses'=>'CompanyController@add']);
	
	
	Route::post('/profile/save', ['as'=>'save', 'uses'=>'CompanyController@save']);

	Route::get('/profile/edit', ['as'=>'edit', 'uses'=>'CompanyController@edit']);

	Route::post('/profile/update', ['as'=>'update', 'uses'=>'CompanyController@update']);

});

Route::group(['prefix'=>'company', 'as'=>'company.', 'middleware'=>'auth'], function () {

	// View
	
	Route::get('/profile/{id}', ['as'=>'viewprofile', 'uses'=>'CompanyController@viewprofile']);

});

Route::group(['prefix'=>'company', 'as'=>'company.'], function () {

	Route::get('/top', ['as'=>'viewtopcompany', 'uses'=>'CompanyController@viewtopcompany']);

});

// ------------------------------------------------------------
// ------------------------------------------------------------ Applications
// ------------------------------------------------------------

Route::group(['prefix'=>'application', 'as'=>'application.', 'middleware'=>['auth', 'alumni']], function () {

	// For Alumni


	Route::get('/overview', ['as'=>'viewall', 'uses'=>'ApplicationController@viewall']);

	Route::get('/interview', ['as'=>'viewinterview', 'uses'=>'ApplicationController@viewinterview']);
	
	Route::get('/{id}', ['as'=>'viewapplication', 'uses'=>'ApplicationController@viewapplication']);

	Route::get('/submit/{id}', ['as'=>'submit', 'uses'=>'ApplicationController@submit']);


});

Route::group(['prefix'=>'application', 'as'=>'application.', 'middleware'=>['auth', 'employer']], function () {

	// For Employer
	
	Route::post('/action/{id}/{action}', ['as'=>'action', 'uses'=>'ApplicationController@action']);

	Route::get('/action/{id}/{action}', ['as'=>'action', 'uses'=>'ApplicationController@action']);

	Route::get('/profile/{id}', ['as'=>'viewalumni', 'uses'=>'ApplicationController@viewalumni']);
});

Route::group(['prefix'=>'admin', 'as'=>'admin.', 'middleware'=>['guest']], function () {

	Route::get('/', function() {
		return view('auth.admin-login');
	});

});

Route::group(['prefix'=>'admin', 'as'=>'admin.', 'middleware'=>['auth', 'admin']], function () {

	// View Dashboard
	Route::get('/dashboard', [
		'as'=>'viewdashboard',
		'uses'=>'AdminController@viewdashboard'
	]);

	Route::post('/graphoverallapplication', [
		'as'=>'graphdashboard',
		'uses'=>'AdminController@graphoverallapplication'
	]);

	Route::post('/graphhiredapplication', [
		'as'=>'graphdashboard',
		'uses'=>'AdminController@graphhiredapplication'
	]);


	Route::get('/company/all', [
		'as'=>'viewallcompany',
		'uses'=>'AdminController@viewallcompany'
	]);

	Route::get('/company/verify', [
		'as'=>'listverifycompany',
		'uses'=>'AdminController@listverifycompany'
	]);

	Route::get('/company/view/{id}', [
		'as'=>'viewcompany',
		'uses'=>'AdminController@viewcompany'
	]);

	Route::get('/company/verify/{id}/{action}', [
		'as'=>'verifycompany',
		'uses'=>'AdminController@verifycompany'
	]);


	Route::get('/job/all', [
		'as'=>'viewalljob',
		'uses'=>'AdminController@viewalljob'
	]);

	Route::get('/job/view/{id}', [
		'as'=>'viewjob',
		'uses'=>'AdminController@viewjob'
	]);


	Route::get('/report/monthly', [
		'as'=>'monthlyreport',
		'uses'=>'AdminController@monthlyreport'
	]);


	Route::get('/report/yearly', [
		'as'=>'yearlyreport',
		'uses'=>'AdminController@yearlyreport'
	]);

});




// ------------------------------------------------------------
// ------------------------------------------------------------ Error Page
// ------------------------------------------------------------

Route::get('{url}',['as'=>'404','uses'=>'ErrorHandlerController@errorCode404']);

Route::get('{url}',['as'=>'405','uses'=>'ErrorHandlerController@errorCode405']);