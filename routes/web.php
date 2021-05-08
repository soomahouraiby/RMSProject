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
Route::group(['namespace'=>'Management'],function (){

    ///////////////////Show///////////////
    Route::get('/Reports','ManagementController@showReports')->name('showReports');
    Route::get('/Users','ManagementController@showUsers')->name('showUsers');

    ///////////////////Filter///////////////
    Route::get('/NewReports','ManagementController@showNewReports')->name('showNewReports');
    Route::get('/TransferReports','ManagementController@showTransferReports')->name('showTransferReports');
    Route::get('/FollowingReports','ManagementController@showFollowingReports')->name('showFollowingReports');
    Route::get('/FollowDoneReports','ManagementController@showFollowDoneReports')->name('showFollowDoneReports');
    Route::get('/DoneReports','ManagementController@showDoneReports')->name('showDoneReports');

    ///////////////////Details///////////////
    Route::get('/details/{report_no}','ManagementController@detailsReport')->name('detailsReport');


});
////////////////////////End Pharmacies Management////////////////////////




////////////////////////Begin Pharmacies Management////////////////////////
Route::group(['namespace'=>'pharmacyManagement'],function (){

    ///////////////////Show///////////////
    Route::get('/newReports','ManageController@newReports')->name('PM_newReports');
    Route::get('/followReports','ManageController@followReports')->name('PM_followReports');

    ///////////////////Filter///////////////
    Route::get('/newSmuggledReports','ManageController@newSmuggledReports')->name('PM_newSmuggledReports');
    Route::get('/newDrownReports','ManageController@newDrownReports')->name('PM_newDrownReports');
    Route::get('/newDifferentReports','ManageController@newDifferentReports')->name('PM_newDifferentReports');
    Route::get('/followingReports','ManageController@followingReports')->name('PM_followingReports');
    Route::get('/followDoneReports','ManageController@followDoneReports')->name('PM_followDoneReports');


    ///////////////////Details///////////////
    Route::get('/detailsDrug/{drug_no}','ManageController@detailsDrug')->name('PM_detailsDrug');
    Route::get('/detailsReport/{report_no}','ManageController@detailsReport')->name('PM_detailsReport');
    Route::get('/detailsFollow/{report_no}','ManageController@detailsFollow')->name('PM_detailsFollow');

    ///////////////////Follow///////////////
    Route::get('/followNewReport/{report_no}','ManageController@followNewReport')->name('PM_followNewReport');
    Route::get('/endFollowUp/{report_no}','ManageController@endFollowUp')->name('PM_endFollowUp');
    Route::post('/addProcedure/{report_no}','ManageController@addProcedure')->name('PM_addProcedure');

    ///////////////////Drug///////////////
    Route::get('/drug','ManageController@drug')->name('PM_drug');
    Route::post('/addDrug','ManageController@addDrug')->name('PM_addDrug');


});
////////////////////////End Pharmacies Management////////////////////////




////////////////////////operations Management////////////////////////
Route::group(['namespace'=>'operationsManagement'],function (){

    ///////////////////Show///////////////
    Route::get('/OP_newReports','OPManageController@newReports')->name('OP_newReports');
    Route::get('/OP_followReports','OPManageController@followReports')->name('OP_followReports');

    ///////////////////Filter///////////////
    Route::get('/OP_newSmuggledReports','OPManageController@newSmuggledReports')->name('OP_newSmuggledReports');
    Route::get('/OP_newDrownReports','OPManageController@newDrownReports')->name('OP_newDrownReports');
    Route::get('/OP_newDiffrentReports','OPManageController@newDiffrentReports')->name('OP_newDiffrentReports');
    Route::get('/OP_newExceptionReports','OPManageController@newExceptionReports')->name('OP_newExceptionReports');
    Route::get('/OP_transferFollowingReports','OPManageController@transferFollowingReports')->name('OP_transferFollowingReports');
    Route::get('/OP_followingReports','OPManageController@followingReports')->name('OP_followingReports');
    Route::get('/OP_followDoneReports','OPManageController@followDoneReports')->name('OP_followDoneReports');
    Route::get('/OP_doneReports','OPManageController@DoneReports')->name('OP_doneReports');

    ///////////////////Details///////////////
    Route::get('/OP_detailsReport/{report_no}','OPManageController@detailsReport')->name('OP_detailsReport');
    Route::get('/OP_detailsReport2/{report_no}','OPManageController@detailsReport2')->name('OP_detailsReport2');
    Route::get('/OP_detailsDrug/{drug_no}','OPManageController@detailsDrug')->name('OP_detailsDrug');
    Route::get('/OP_detailsSmuggledReport/{report_no}','OPManageController@detailsSmuggledReport')->name('OP_detailsSmuggledReport');
    Route::get('/OP_detailsSmuggledReport2/{report_no}','OPManageController@detailsSmuggledReport2')->name('OP_detailsSmuggledReport2');

    ///////////////////Transfer///////////////
    Route::get('/OP_transferReports/{report_no}', 'OPManageController@transferReports')->name('OP_transferReports');

    ///////////////////Follow///////////////
    Route::get('/OP_followedUp/{report_no}','OPManageController@followedUp')->name('OP_followedUp');
    Route::get('/OP_followedUp2/{report_no}','OPManageController@followedUp2')->name('OP_followedUp2');
    Route::get('/OP_followedUp3/{report_no}','OPManageController@followedUp3')->name('OP_followedUp3');

    ///////////////////OPManagement notes///////////////
    Route::get('/OP_editReport/{report_no}', 'OPManageController@editReport')->name('OP_editReport');
    Route::post('/OP_saveOPMNotes/{report_no}', 'OPManageController@saveOPMNotes')->name('OP_saveOPMNotes');

    ///////////////////Add report///////////////
    Route::get('/OP_selectBNumber','OPManageController@selectBNumber')->name('OP_selectBNumber');
    Route::get('/OP_addReport','OPManageController@addReport')->name('OP_addReport');
    Route::post('OP_store', 'OPManageController@store')->name('OP_store');
});
////////////////////////operations Management////////////////////////




////////////////////////Begin pharmacovigilance Management////////////////////////
Route::group(['namespace'=>'pharmacovigilanceManagement'],function (){

    ///////////////////Show///////////////
    Route::get('/PHC_newReports','PHCManageController@newReports')->name('PHC_newReports');
    Route::get('/PHC_followReports','PHCManageController@followReports')->name('PHC_followReports');

    ///////////////////Filter///////////////
    Route::get('/PHC_newQualityReports','PHCManageController@newQualityReports')->name('PHC_newQualityReports');
    Route::get('/PHC_newEffectReports','PHCManageController@newEffectReports')->name('PHC_newEffectReports');
    Route::get('/PHC_followingReports','PHCManageController@followingReports')->name('PHC_followingReports');
    Route::get('/PHC_doneReports','PHCManageController@DoneReports')->name('PHC_doneReports');

    ///////////////////Details///////////////
    Route::get('/PHC_detailsReport/{report_no}','PHCManageController@detailsReport')->name('PHC_detailsReport');
    Route::get('/PHC_detailsEffectReport/{report_no}','PHCManageController@detailsEffectReport')->name('PHC_detailsEffectReport');
    Route::get('/PHC_detailsReport2/{report_no}','PHCManageController@detailsReport2')->name('PHC_detailsReport2');
    Route::get('/PHC_detailsEffectReport2/{report_no}','PHCManageController@detailsEffectReport2')->name('PHC_detailsEffectReport2');
    Route::get('/PHC_detailsDrug/{drug_no}','PHCManageController@detailsDrug')->name('PHC_detailsDrug');

    ///////////////////Transfer///////////////
    Route::get('/transferReports/{report_no}', 'PHCManageController@transferReports')->name('PHC_transferReports');

    ///////////////////Follow///////////////
    Route::get('/PHC_followedUp/{report_no}','PHCManageController@followedUp')->name('PHC_followedUp');
    Route::get('/PHC_followedUp2/{report_no}','PHCManageController@followedUp2')->name('PHC_followedUp2');
    Route::get('/PHC_createProcedure/{report_no}', 'PHCManageController@createProcedure')->name('PHC_createProcedure');
    Route::post('/PHC_store/{report_no}', 'PHCManageController@store')->name('PHC_store');

});
////////////////////////End pharmacovigilance Management////////////////////////
