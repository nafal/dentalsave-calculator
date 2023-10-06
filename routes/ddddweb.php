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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('users.index');//'welcome'
});

Route::post('/userhome', 'UserController@usercalculatorform')->name('usercalculator');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('autocomplete-search',array('as'=>'autocomplete.search','uses'=>'UserController@index1'));

Route::get('autocomplete-ajax',array('as'=>'autocomplete.ajax/{id}','uses'=>'UserController@ajaxData'));


Route::get('/getgrid/{id}', 'UserController@getgrid')->name('getgrid');

Route::get('searchajax',array('as'=>'searchajax','uses'=>'UserController@usercalculatorform'));
//Route::get('/userhome', 'UserController@index')->name('index');

Route::get('/procedure', 'ProcedureController@create')->name('createProcedure');
Route::post('/create', 'ProcedureController@store')->name('storeProcedure');
Route::get('/index', 'ProcedureController@index');
Route::get('/delete/{id}', 'ProcedureController@destroy')->name('delete');
Route::get('/dental-edit/{id}', 'ProcedureController@edit')->name('edit');

Route::get('/course-edit/{id}', 'CourseController@edit')->name('editcourse');
Route::put('/update1/{id}', 'CourseController@update')->name('updateCourse');
Route::put('/update/{id}', 'ProcedureController@update')->name('updateProcedure');
Route::get('/search', 'ProcedureController@search');
Route::get('/create', 'CourseController@create')->name('createCourse');
Route::post('/storeMyProcedure', 'CourseController@store')->name('storeCourse');
Route::get('/courseIndex', 'CourseController@courseIndex')->name('courseList');

Route::get('/add-new-pin', 'PincodeController@show')->name('addPin');
Route::post('/save-new-pin', 'PincodeController@store')->name('savePin');
Route::get('/pin-index', 'PincodeController@index');
Route::get('/pin-edit/{id}', 'PincodeController@edit')->name('pinedit');
Route::put('/pin-update/{id}', 'PincodeController@update')->name('updatePin');
Route::get('/create-ds-network', 'NetworkController@create')->name('createNetwork');
Route::post('/store-ds-network', 'NetworkController@store')->name('storeNetwork');
Route::get('/network-index', 'NetworkController@index');
Route::get('/ds-network-edit/{id}', 'NetworkController@edit')->name('dsNetworkedit');
Route::put('/ds-network-update/{id}', 'NetworkController@update')->name('dsNetworkUpdate');
Route::get('/destroy-ds-network/{id}', 'NetworkController@destroy')->name('deleteDsNetwork');
Route::get('/mapp-prefix-network', 'PrefixNetworkController@create')->name('mapPrefixNetwork');
Route::post('/store-prefix-network', 'PrefixNetworkController@store')->name('storePrefixNetwork');
Route::get('/prefix-network-index', 'PrefixNetworkController@index');
Route::get('/usual-fee-create', 'UsualFeeController@create')->name('createUsualFee');
Route::get('api/get-state-list','UsualFeeController@getCourseList');
Route::post('/store-usual-fee','UsualFeeController@store')->name('storeUsualFee');
Route::get('api/get-pin-list','UsualFeeController@getPrefixList');
Route::get('/usual-fee-index', 'UsualFeeController@index');
Route::get('/dental-fee-create', 'DentalFeeController@create')->name('createDentalFee');
Route::post('/store-dental-fee','DentalFeeController@store')->name('storeDentalFee');
Route::get('/edit-usual-fee/{id}', 'UsualFeeController@edit')->name('usualfeeedit');
Route::put('/update-usual-fee/{id}', 'UsualFeeController@update')->name('usualfeestore');
Route::get('/destroy-usual-fee/{id}', 'UsualFeeController@destroy')->name('deleteUsualFee');
Route::get('/get-fee-form', 'DashboardController@create')->name('getfeeform');
Route::post('/check-fees', 'DashboardController@store')->name('getmyfee');
Route::get('/dental-fee-index', 'DentalFeeController@index');
Route::get('/ajax', 'UsualFeeController@ajax');
Route::get('/searchajax', 'UsualFeeController@searchResponse')->name('searchajax');
Route::get('/autocomplete', 'DentalFeeController@autocomplete')->name('autocomplete');
Route::get('/admin-change-password', 'AdminController@changePassword')->name('showchangepasswordform');
Route::post('/update-password', 'AdminController@updatePassword')->name('storePassword');

Route::get('/uploadfile','UploadController@index')->name('uploadroute');
Route::post('/uploadfile','UploadController@showUploadFile')->name('uploadroute');

Route::get('/uploaddsfile','UploadController@uploadds')->name('uploaddsroute');
Route::post('/uploaddsfile','UploadController@showUploadDsFile')->name('uploaddsroute');



Route::get('/view/{id}', 'CourseController@view')->name('view');




