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
Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'BackendController@index');

    //Profile
    Route::get('/profile/view','BackendController@profilePageView');
    Route::get('/free/job/post/page','BackendController@freeJobPostPage');
    Route::post('/add/free/job','BackendController@addFreeJob');

    //Job
    Route::get('/job/view/page','JobController@viewAllJobs');
    Route::get('/delete/job/{id}','JobController@deleteJob');
    Route::get('/active/job/{id}','JobController@activeJob');
    Route::get('/inactive/job/{id}','JobController@inactiveJob');

    //job category
    Route::get('/job/category/page','CategoryController@jobCategoryPage');
    Route::post('/add/new/job/category','CategoryController@addNewCategory');
    Route::get('/delete/job/category/{id}','CategoryController@deleteJobCategory');
    Route::get('edit/job/category/{id}/edit','CategoryController@getDataForModel');

    // Footer Page
    Route::get('/terms/backend/page','BackendController@termsBackendPage');
    Route::post('/add/terms','BackendController@addTerms');
    Route::get('/privacy/backend/page','BackendController@privacyBackendPage');
    Route::post('/add/privacy','BackendController@addPrivacy');
    Route::get('/contact/backend/page','BackendController@contactBackendPage');
    Route::post('/add/contact','BackendController@addContact');

    //side adds and banner adds
    Route::get('/side/ad/page','AdController@sideAddPage');
    Route::post('/add/new/side/add','AdController@addNewSideAd');
    Route::get('/delete/side/ad/{id}','AdController@deleteSideAd');

    // CV
    Route::get('/cv/backend/page','CVController@CVBackendPage');
    Route::get('/delivered/cv/{id}','CVController@deliveredCV');
    Route::get('/delete/cv/{id}','CVController@deleteCV');
    Route::get('/detail/view/cv/{id}','CVController@detailViewCV');

    Route::get('/view/cv/for/jobs','CVController@viewCVForJobs');
    Route::get('/delete/cv/for/jobs/{id}','CVController@deleteCVForJob');

});

//Frontend Routes
Route::get('/add/job/page','JobController@addJobPage');
Route::post('/add/new/job','JobController@addNewJob');


// CV related routes
Route::get('/cv/maker/page','CVController@CVmakePage');
Route::post('/add/new/cv','CVController@addNewCV');
Route::post('/add/cv/payment','CVController@addCVPayment');

// job Payment
Route::post('/update/job/payment','JobController@updateJobPayment');


Route::get('/get/city/by/country/{id}','JobController@getCityByCountry');


Route::get('/','FrontendController@index');
Route::get('/category/wise/jobs/{id}','FrontendController@categoryWiseJobs');
Route::post('/search/by/name','FrontendController@searchByName');
Route::post('/search/by/Job/title','FrontendController@searchByJobTitle');

// footer pages
Route::get('/terms','FrontendController@termsPage');
Route::get('/privacy','FrontendController@privacyPage');
Route::get('/contact','FrontendController@contactPage');


//stripe api
// Route::get('stripe', 'StripePaymentController@stripe');
// Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

// submit cv
Route::get('/get/job/data/{id}/edit','JobCVController@getJobData');
Route::post('/cv/submit/for/job','JobCVController@cvSubmitForJob');
