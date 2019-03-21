<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'countyResource' => 'API\CountyController',
    'subCountyResource' => 'API\SubCountyController',
    'constituencyResource' => 'API\ConstituencyController',
    'locationResource' => 'API\LocationController',
    'villageResource' => 'API\VillageController',
    'groupResource' => 'API\GroupController',
    'messageResource' => 'API\MessageController',
    'serviceResource' => 'API\ServiceController',
    'memberResource' => 'API\MemberContoller',
]);

Route::post('userResource/updatePassword', [
    'as' => 'userUpdatePassword',
    'uses' => 'API\UserController@updatePassword'
]);

Route::post('userResource/loadMe', [
    'as' => 'loadMe',
    'uses' => 'API\UserController@loadMe'
]);

Route::post('groupResource/getAdminGroupCount', [
    'as' => 'getAdminGroupCount',
    'uses' => 'API\GroupController@getAdminGroupCount'
]);

Route::get('subCountyResource/getSubCountiesOfCounty/{county}', [
    'as' => 'getSubCountiesOfCounty',
    'uses' => 'API\SubCountyController@getSubCountiesOfCounty'
]);

Route::get('constituencyResource/getConstituenciesOfSubCounty/{subCounty}', [
    'as' => 'getConstituenciesOfSubCounty',
    'uses' => 'API\ConstituencyController@getConstituenciesOfSubCounty'
]);

Route::get('locationResource/getLocationsOfConstituency/{constituency}', [
    'as' => 'getLocationsOfConstituency',
    'uses' => 'API\LocationController@getLocationsOfConstituency'
]);

Route::get('villageResource/getVillagesOfLocation/{location}', [
    'as' => 'getVillagesOfLocation',
    'uses' => 'API\VillageController@getVillagesOfLocation'
]);

Route::get('groupResource/getGroupsOfVillage/{village}', [
    'as' => 'getGroupsOfVillage',
    'uses' => 'API\GroupController@getGroupsOfVillage'
]);

Route::post('memberResource/checkIfAssignedToGroup', [
    'as' => 'checkIfAssignedToGroup',
    'uses' => 'API\MemberContoller@checkIfAssignedToGroup'
]);

Route::post('groupResource/getGroupData', [
    'as' => 'getGroupData',
    'uses' => 'API\GroupController@getGroupData'
]);

Route::post('groupResource/getGroupLocation', [
    'as' => 'getGroupLocation',
    'uses' => 'API\GroupController@getGroupLocation'
]);

Route::post('messageResource/loadMessages', [
    'as' => 'loadMessages',
    'uses' => 'API\MessageController@loadMessages'
]);

Route::post('memberResource/getMembers', [
    'as' => 'getGroupMembers',
    'uses' => 'API\MemberContoller@getGroupMembers'
]);

