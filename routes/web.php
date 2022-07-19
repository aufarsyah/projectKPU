<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckSession;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PrivilegeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AuditTrailController;
use App\Http\Controllers\PerizinanLNController;
use App\Http\Controllers\PerizinanNikahController;
use App\Http\Controllers\NotesLNController;
use App\Http\Controllers\NotesNikahController;
use App\Http\Controllers\KeperluanController;
use App\Http\Controllers\GrafikDPTController;
use App\Http\Controllers\GrafikPPWPController;

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

Route::get('/', function () {
	return redirect('signin');
});

Route::get('/show_token',                       [AuthController::class,'show_token']);

Route::get('/signin',                           [AuthController::class,'signin_page']);
Route::get('/signup',                           [AuthController::class,'signup_page']);

Route::post('/signin_process',                  [AuthController::class,'signin_process']);
Route::post('/signup_process',                  [AuthController::class,'signup_process']);
Route::get('/signout_process',                  [AuthController::class,'signout_process']);

//Route::resource('/test',                             [TestController::class, 'index'])->name('testnama');
Route::resource('/mail',                        MailController::class);


Route::middleware(['checkSession', 'auditTrail'])->group(function () {

	Route::get('/dashboard',                    [DashboardController::class,'dashboard_page']);
	

	Route::resource('/privilege',               PrivilegeController::class);
	Route::get('/privilege/option/{id}',        [PrivilegeController::class, 'option']);
	
	Route::get('/user/option/{id}',             [UserController::class, 'option']);

	Route::get('/area/option/{id}',             [AreaController::class, 'option']);

	Route::get('/group/option/{id}',            [GroupController::class, 'option']);

	Route::resource('/audit_trail',             AuditTrailController::class);
	
	Route::resource('/profile', ProfileController::class, ['names' => [
		'index' => 'profile_setup',
		'show' => 'profile_setup_read',
		'update' => 'profile_setup_update'
	]]);

	Route::resource('/grafik_dpt', GrafikDPTController::class, ['names' => [
		'index' => 'grafik_dpt_setup',
		'show' => 'grafik_dpt_setup_read',
		'store' => 'grafik_dpt_setup_create',
		'update' => 'grafik_dpt_setup_update',
		'destroy' => 'grafik_dpt_setup_delete'
	]]);

	Route::get('/grafik_dpt/option_provinsi/{id}',   [GrafikDPTController::class, 'option_provinsi']);
	Route::get('/grafik_dpt/option_kabkota/{id}',    [GrafikDPTController::class, 'option_kabkota']);
	Route::get('/grafik_dpt/option_kecamatan/{id}',  [GrafikDPTController::class, 'option_kecamatan']);
	Route::get('/grafik_dpt/option_kelurahan/{id}',  [GrafikDPTController::class, 'option_kelurahan']);
	Route::get('/grafik_dpt/option_tps/{id}',        [GrafikDPTController::class, 'option_tps']);
	Route::post('/grafik_dpt/data_gender',           [GrafikDPTController::class,'data_gender']);


	Route::resource('/grafik_ppwp', GrafikPPWPController::class, ['names' => [
		'index' => 'grafik_ppwp_setup',
		'show' => 'grafik_ppwp_setup_read',
		'store' => 'grafik_ppwp_setup_create',
		'update' => 'grafik_ppwp_setup_update',
		'destroy' => 'grafik_ppwp_setup_delete'
	]]);

	Route::get('/grafik_ppwp/option_provinsi/{nama}',	[GrafikPPWPController::class, 'option_provinsi']);
	Route::get('/grafik_ppwp/option_kabkota/{nama}',	[GrafikPPWPController::class, 'option_kabkota']);
	Route::post('/grafik_ppwp/data_provinsi',			[GrafikPPWPController::class,'data_provinsi']);
	Route::post('/grafik_ppwp/data_kabkota',			[GrafikPPWPController::class,'data_kabkota']);



	Route::get('/institution_sensors_map', [InstitutionSensorsController::class, 'index_map']);

	Route::middleware(['checkPrivilege'])->group(function () {


		Route::resource('/user', UserController::class, ['names' => [
			'index' => 'user_setup',
			'show' => 'user_setup_read',
			'store' => 'user_setup_create',
			'update' => 'user_setup_update',
			'destroy' => 'user_setup_delete'
		]]);
		
		Route::resource('/group', GroupController::class, ['names' => [
			'index' => 'group_setup',
			'show' => 'group_setup_read',
			'store' => 'group_setup_create',
			'update' => 'group_setup_update',
			'destroy' => 'group_setup_delete'
		]]);

	});

});