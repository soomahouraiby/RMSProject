<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');



////////////////////////Begin Pharmacies Management////////////////////////
Route::group(['namespace'=>'pharmacyManagement'],function (){

    ///////////////////Show///////////////
    Route::get('/newReports','ManageController@newReports')->name('PM_newReports');
    Route::get('/followReports','ManageController@followReports')->name('PM_followReports');

    ///////////////////Filter///////////////
    Route::get('/newSmuggledReports','ManageController@newSmuggledReports')->name('PM_newSmuggledReports');
    Route::get('/newDrownReports','ManageController@newDrownReports')->name('PM_newDrownReports');
    Route::get('/newDifferentReports','ManageController@newDifferentReports')->name('PM_newDifferentReports');

    ///////////////////Details///////////////
    Route::get('/detailsDrug/{drug_no}','ManageController@detailsDrug')->name('PM_detailsDrug');
    Route::get('/detailsReport/{report_no}','ManageController@detailsReport')->name('PM_detailsReport');
    Route::get('/detailsFollow/{report_no}','ManageController@detailsFollow')->name('PM_detailsFollow');

    ///////////////////Follow///////////////
    Route::get('/followNewReport/{report_no}','ManageController@followNewReport')->name('PM_followNewReport');
    Route::get('/endFollowUp/{report_no}','ManageController@endFollowUp')->name('PM_endFollowUp');
    Route::post('/addProcedure/{report_no}','ManageController@addProcedure')->name('PM_addProcedure');

    ///////////////////Drug///////////////
    Route::get('/addDrug','ManageController@addDrug')->name('PM_addDrug');


});
////////////////////////End Pharmacies Management////////////////////////




////////////////////////operations Management////////////////////////
Route::group(['prefix'=>'operationsManagement'],function (){

    Route::get('/newReports','OPManageController@newReports')->name('OP_newReports');
    Route::get('/newSmuggledReports','OPManageController@newSmuggledReports')->name('OP_newSmuggledReports');
    Route::get('/newDrownReports','OPManageController@newDrownReports')->name('OP_newDrownReports');
    Route::get('/newDiffrentReports','OPManageController@newDiffrentReports')->name('OP_newDiffrentReports');
    Route::get('/newExceptionReports','OPManageController@newExceptionReports')->name('OP_newExceptionReports');
    Route::get('/addReport','OPManageController@addReport')->name('OP_addReport');
    Route::get('/followReports','OPManageController@followReports')->name('OP_followReports');
    Route::get('/transferFollowingReports','OPManageController@transferFollowingReports')->name('OP_transferFollowingReports');
    Route::get('/followingReports','OPManageController@followingReports')->name('OP_followingReports');
    Route::get('/followDoneReports','OPManageController@followDoneReports')->name('OP_followDoneReports');
    Route::get('/DoneReports','OPManageController@DoneReports')->name('OP_DoneReports');
    Route::get('/detailsReport/{report_no}','OPManageController@detailsReport')->name('OP_detailsReport');
    Route::get('/detailsReport2/{report_no}','OPManageController@detailsReport2')->name('OP_detailsReport2');
    Route::get('/detailsDrug/{drug_no}','OPManageController@detailsDrug')->name('OP_detailsDrug');
    Route::get('/detailsSmuggledReport/{report_no}','OPManageController@detailsSmuggledReport')->name('OP_detailsSmuggledReport');
    Route::get('/detailsSmuggledReport2/{report_no}','OPManageController@detailsSmuggledReport2')->name('OP_detailsSmuggledReport2');
    Route::get('/followedUp/{report_no}','OPManageController@followedUp')->name('OP_followedUp');
    Route::get('/followedUp2/{report_no}','OPManageController@followedUp2')->name('OP_followedUp2');
    Route::get('/followedUp3/{report_no}','OPManageController@followedUp3')->name('OP_followedUp3');
    Route::get('/transferReports/{report_no}', 'OPManageController@transferReports')->name('OP_transferReports');
    Route::get('/editReport/{report_no}', 'OPManageController@editReport')->name('OP_editReport');
    Route::post('/saveOPMNotes/{report_no}', 'OPManageController@saveOPMNotes')->name('OP_saveOPMNotes');
    Route::get('create', 'OPManageController@create');
    Route::post('store', 'OPManageController@store')->name('report.store');
});
////////////////////////operations Management////////////////////////




////////////////////////Begin pharmacovigilance Management////////////////////////
Route::group(['prefix'=>'pharmacovigilanceManagement'],function (){

    Route::get('/newReports','PHCManageController@newReports')->name('PHC_newReports');
    Route::get('/newQualityReports','PHCManageController@newQualityReports')->name('PHC_newQualityReports');
    Route::get('/newEffectReports','PHCManageController@newEffectReports')->name('PHC_newEffectReports');
    Route::get('/transferReports/{report_no}', 'PHCManageController@transferReports')->name('PHC_transferReports');
    Route::get('/addReport','PHCManageController@addReport')->name('PHC_addReport');
    Route::get('/followReports','PHCManageController@followReports')->name('PHC_followReports');
    Route::get('/followingReports','PHCManageController@followingReports')->name('PHC_followingReports');
    Route::get('/detailsReport/{report_no}','PHCManageController@detailsReport')->name('PHC_detailsReport');
    Route::get('/detailsEffectReport/{report_no}','PHCManageController@detailsEffectReport')->name('PHC_detailsEffectReport');
    Route::get('/detailsReport2/{report_no}','PHCManageController@detailsReport2')->name('PHC_detailsReport2');
    Route::get('/detailsEffectReport2/{report_no}','PHCManageController@detailsEffectReport2')->name('PHC_detailsEffectReport2');
    Route::get('/detailsDrug/{drug_no}','PHCManageController@detailsDrug')->name('PHC_detailsDrug');
    Route::get('/followedUp/{report_no}','PHCManageController@followedUp')->name('PHC_followedUp');
    Route::get('/followedUp2/{report_no}','PHCManageController@followedUp2')->name('PHC_followedUp2');
    Route::get('/createProcedure/{report_no}', 'PHCManageController@createProcedure')->name('PHC_createProcedure');
    Route::post('/store/{report_no}', 'PHCManageController@store')->name('PHC_store');
});
////////////////////////End pharmacovigilance Management////////////////////////


