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

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::post('/projects/new', 'ProjectController@store');
Route::post('/projects/staffs/new', 'StaffController@store');
Route::post('/projects/costs/new', 'CostController@store');
Route::post('/projects/judgement/{id}', 'JudgementController@insert_grade')->middleware('auth:web');
Route::post('/projects/finalJudgement/{id}', 'JudgementController@final_insert_grade')->middleware('auth:web');
Route::post('/projects/edit/{project}', 'ProjectController@edit')->middleware('auth:web');


Route::post('/colleges/new', 'CollegeController@store');
Route::post('/colleges/edit/{college}', 'CollegeController@edit_college');




Route::post('/forums/new', 'ForumController@store');
Route::post('/forums/staffs/new', 'StaffController@forum_staff_store');
Route::post('/forums/edit/{forum}', 'ForumController@edit_forum');






Route::get('/test', 'ProjectController@test');
Route::get('/charts', 'ChartController@showCharts');


Route::get('/projects/add', 'ProjectController@add')->middleware('auth:web');
Route::get('/projects', 'ProjectController@index')->middleware('auth:web');
Route::get('/projects/{id}', 'ProjectController@show')->middleware('auth:web');
Route::get('/projects/judge/{id}', 'JudgementController@set_grade')->middleware('auth:web');
Route::get('/projects/finalJudge/{id}', 'JudgementController@index_grades')->middleware('auth:web');


Route::get('/colleges/add', 'CollegeController@add')->middleware('auth:web');
Route::get('/colleges', 'CollegeController@index')->middleware('auth:web');
Route::get('/colleges/edit/{college}', 'CollegeController@edit_college_view')->middleware('auth:web');



Route::get('/forums/add', 'ForumController@add')->middleware('auth:web');
Route::get('/forums', 'ForumController@index')->middleware('auth:web');
Route::get('/forums/{id}', 'ForumController@show')->middleware('auth:web');
Route::get('/forums/edit/{forum}', 'ForumController@edit_forum_view')->middleware('auth:web');



Route::get('/users/manage', 'UserController@manage')->middleware('auth:web');
Route::get('/users/account', 'UserController@account')->middleware('auth:web');
Route::post('/users/roles', 'UserController@manage_roles')->middleware('auth:web');
Route::post('/users/edit-account', 'UserController@edit_account')->middleware('auth:web');





Route::get('/role', function (){
//        $role = Role::create(['name' => 'davari']);
//    $permission = Permission::create(['name' => 'پرمیژن']);
////
//    $role->givePermissionTo($permission);
////
//    $user = auth('web')->user();
//    $user->givePermissionTo($permission);
//    $user->assignRole($role);
////
//    if ($user->hasRole('dabir komite4')){
//        return "dabir komite";
//    }

//
//    $user = \App\User::find(1);
//    $role = Role::create(['name' => 'judge']);
//    $view_tarviji = Permission::create(['name' => 'ترویجی']);
//    $ins = Permission::create(['name' => 'insert project']);
//    $view_mosabegheyi = Permission::create(['name' => 'مسابقه ای']);
//    $role->givePermissionTo($view_tarviji);
//    $role->givePermissionTo($view_mosabegheyi);
//    $user->assignRole($role);
//    $user->givePermissionTo($ins);

//     Auth()->user()->removeRole('dabir komite4');
//     return Auth()->user()->getDirectPermissions()[1]->name;
//    return Auth()->user()->revokePermissionTo(['view projects4', 'view tarviji']);


//    return User::permission('view projects')->get();
//    return User::role('dabir komite')->get();
//    app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
//     Permission::create(['name' => 'ترویجی']);
//     Permission::create(['name' => 'مسابقه ای']);
//     Permission::create(['name' => 'آموزشی']);

//     Role::create(['name' => 'dabir']);
//     Role::create(['name' => 'davar']);
//     Role::create(['name' => 'staff']);
//    Auth()->user()->assignRole($role);

})->middleware('auth:web');

route::post('/permissions/judgment','UserController@permissions_for_judgments')->middleware('auth:web');
