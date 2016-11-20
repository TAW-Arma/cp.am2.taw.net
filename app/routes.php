<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',         function() { return Redirect::to('login'); });
Route::get('logout',    function() { Auth::logout(); return Redirect::to('login'); });

Route::post('login', function()
{
    try
    {
        Auth::attempt(array('username' => Input::get('username'), 'password' =>Input::get('password')));
        return Redirect::to('backend');
    }
    catch (Toddish\Verify\UserNotFoundException $e)
    {
        return Redirect::to('login')->with('error', Lang::get('users.message_user_has_not_been_found'));
    }
    catch (Toddish\Verify\UserUnverifiedException $e)
    {
        return Redirect::to('login')->with('error', Lang::get('users.message_user_has_not_been_verified'));
    }
    catch (Toddish\Verify\UserDisabledException $e)
    {
        return Redirect::to('login')->with('error', Lang::get('users.message_user_has_been_disabled'));
    }
    catch (Toddish\Verify\UserDeletedException $e)
    {
        return Redirect::to('login')->with('error', Lang::get('users.message_user_has_been_deleted'));
    }
    catch (Toddish\Verify\UserPasswordIncorrectException $e)
    {
        return Redirect::to('login')->with('error', Lang::get('users.message_incorrect_password'));
    }
});
Route::get('login', function()
{
    return View::make('login');
});

Route::get('backend',
[   
    'before'    => 'auth',
    function()
    {
        return View::make('backend');
    }
]);

Route::get('backend/dashboard',
[
    'before'    => 'auth',
    'uses'      => 'DashboardController@GetIndex',
]);

Route::get('backend/administration',
[
    'before'    => 'auth',
    'uses'      => 'AdministrationController@GetAdministration',
]);

Route::get('backend/administration/update_arma',
[
    'before'    => 'auth',
    'uses'      => 'AdministrationController@GetUpdateArma',
]);


Route::get('backend/my-profile',
[
    'before'    => 'auth',
    'uses'      => 'UserController@GetMyProfile',
]);

Route::post('backend/my-profile',
[
    'before'    => 'auth',
    'uses'      => 'UserController@PostMyProfile',
]);

Route::get('backend/security/user',
[
    'before'    => 'auth',
    'uses'      => 'UserController@GetIndex',
]);

Route::get('backend/security/user/create',
[
    'before'    => 'auth',
    'uses'      => 'UserController@GetCreate',
]);

Route::get('backend/security/user/update/{id}',
[
    'before'    => 'auth',
    'uses'      => 'UserController@GetUpdate',
]);

Route::get('backend/security/user/delete/{id}',
[
    'before'    => 'auth',
    'uses'      => 'UserController@GetDelete',
]);

Route::post('backend/security/user/create',
[
    'before'    => 'auth',
    'uses'      => 'UserController@PostCreate',
]);

Route::post('backend/security/user/update/{id}',
[
    'before'    => 'auth',
    'uses'      => 'UserController@PostUpdate',
]);

Route::post('backend/security/user/update_role/{id}',
[
    'before'    => 'auth',
    'uses'      => 'UserController@PostUpdateRole',
]);

Route::get('backend/security/role',
[
    'before'    => 'auth',
    'uses'      => 'RoleController@GetIndex',
]);

Route::get('backend/security/role/create',
[
    'before'    => 'auth',
    'uses'      => 'RoleController@GetCreate',
]);

Route::get('backend/security/role/update/{id}',
[
    'before'    => 'auth',
    'uses'      => 'RoleController@GetUpdate',
]);

Route::get('backend/security/role/delete/{id}',
[
    'before'    => 'auth',
    'uses'      => 'RoleController@GetDelete',
]);

Route::post('backend/security/role/create',
[
    'before'    => 'auth',
    'uses'      => 'RoleController@PostCreate',
]);

Route::post('backend/security/role/update/{id}',
[
    'before'    => 'auth',
    'uses'      => 'RoleController@PostUpdate',
]);

Route::post('backend/security/role/update_permission/{id}',
[
    'before'    => 'auth',
    'uses'      => 'RoleController@PostUpdatePermission',
]);

Route::get('backend/security/permission',
[
    'before'    => 'auth',
    'uses'      => 'PermissionController@GetIndex',
]);

Route::get('backend/security/permission/create',
[
    'before'    => 'auth',
    'uses'      => 'PermissionController@GetCreate',
]);

Route::get('backend/security/permission/update/{id}',
[
    'before'    => 'auth',
    'uses'      => 'PermissionController@GetUpdate',
]);

Route::get('backend/security/permission/delete/{id}',
[
    'before'    => 'auth',
    'uses'      => 'PermissionController@GetDelete',
]);

Route::post('backend/security/permission/create',
[
    'before'    => 'auth',
    'uses'      => 'PermissionController@PostCreate',
]);

Route::post('backend/security/permission/update/{id}',
[
    'before'    => 'auth',
    'uses'      => 'PermissionController@PostUpdate',
]);

Route::get('backend/server',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetIndex',
]);

Route::get('backend/server/create',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetCreate',
]);

Route::get('backend/server/update/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetUpdate',
]);

Route::get('backend/server/update_server_cfg/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetUpdateServerCFG',
]);

Route::get('backend/server/update_basic_cfg/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetUpdateBasicCFG',
]);

Route::get('backend/server/update_profile/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetUpdateProfile',
]);

Route::get('backend/server/delete/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetDelete',
]);

Route::post('backend/server/create',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@PostCreate',
]);

Route::post('backend/server/update/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@PostUpdate',
]);

Route::post('backend/server/update_server_cfg/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@PostUpdateServerCFG',
]);

Route::post('backend/server/update_basic_cfg/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@PostUpdateBasicCFG',
]);

Route::post('backend/server/update_profile/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@PostUpdateProfile',
]);

Route::post('backend/server/update_admin/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@PostUpdateAdmin',
]);

Route::get('backend/server/loglist/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetLogList',
]);

Route::get('backend/server/logviewer/{id}/{filepath}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetLogViewer',
]);

Route::get('backend/server/filemanager/view/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetFileManagerView',
]);

Route::get('backend/server/filemanager/connector/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetFileManagerConnector',
]);

Route::post('backend/server/filemanager/connector/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetFileManagerConnector',
]);

Route::get('backend/server/missions',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetMissions',
]);
Route::get('backend/server/missions/{message_type}/{message}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetMissions',
]);

Route::post('backend/server/missions',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@PostMissions',
]);

Route::get('backend/server/delete_mission/{mission}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetDeleteMission',
]);

Route::get('backend/server/download_mission/{mission}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetDownloadMission',
]);

Route::get('backend/server/bans',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetBans',
]);

Route::post('backend/server/bans',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@PostBans',
]);

Route::get('backend/server/start/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetStart',
]);

Route::get('backend/server/restart/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetRestart',
]);

Route::get('backend/server/stop/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@GetStop',
]);

Route::get('api/server/start/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@ApiStart',
]);

Route::get('api/server/restart/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@ApiRestart',
]);

Route::get('api/server/stop/{id}',
[
    'before'    => 'auth',
    'uses'      => 'ServerController@ApiStop',
]);

Route::get('api/server/player_stats',
[
    'uses'      => 'ServerController@ApiGetPlayerStats',
]);

Route::get('api/server/server_stats',
[
    'uses'      => 'ServerController@ApiGetServerStats',
]);

Route::get('backend/squad',
[
    'before'    => 'auth',
    'uses'      => 'SquadController@GetIndex',
]);

Route::get('backend/squad/create',
[
    'before'    => 'auth',
    'uses'      => 'SquadController@GetCreate',
]);

Route::get('backend/squad/update/{id}',
[
    'before'    => 'auth',
    'uses'      => 'SquadController@GetUpdate',
]);

Route::get('backend/squad/members/{id}',
[
    'before'    => 'auth',
    'uses'      => 'SquadController@GetUpdateMembers',
]);

Route::get('backend/squad/delete/{id}',
[
    'before'    => 'auth',
    'uses'      => 'SquadController@GetDelete',
]);

Route::post('backend/squad/create',
[
    'before'    => 'auth',
    'uses'      => 'SquadController@PostCreate',
]);

Route::post('backend/squad/update/{id}',
[
    'before'    => 'auth',
    'uses'      => 'SquadController@PostUpdate',
]);

Route::post('backend/squad/update_management/{id}',
[
    'before'    => 'auth',
    'uses'      => 'SquadController@PostUpdateManagement',
]);

Route::post('backend/squad/members/{id}',
[
    'before'    => 'auth',
    'uses'      => 'SquadController@PostUpdateMembers',
]);

Route::get('/squads/{nickname}/squad.xml',
[
    'uses'      => 'SquadController@GetSquadXML',
]);

Route::get('/squads/{nickname}/squad.xsl',
[
    'uses'      => 'SquadController@GetSquadXSL',
]);

Route::get('/squads/{nickname}/squad.dtd',
[
    'uses'      => 'SquadController@GetSquadDTD',
]);

Route::get('/squads/{nickname}/squad.css',
[
    'uses'      => 'SquadController@GetSquadCSS',
]);

Route::get('/squads/{nickname}/{logo}.paa',
[
    'uses'      => 'SquadController@GetSquadLogoPAA',
]);

Route::get('/squads/{nickname}/{logo}.png',
[
    'uses'      => 'SquadController@GetSquadLogoPNG',
]);
