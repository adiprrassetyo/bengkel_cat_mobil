<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\PerbaikanController;
use App\Http\Controllers\ProgresController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfilBengkelController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\KendaraanController;
use App\Models\ProfilBengkel;

Route::get('/', function () {
	$profilBengkel = ProfilBengkel::findOrFail(1);
	return view('index',[
		'title' => 'home',
		'profilBengkel' => $profilBengkel
	]); 
});

Route::get('/error', function () { return view('error',['title' => 'error']); });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/berita',[BeritaController::class,'index']);
Route::get('/berita/{slug}',[BeritaController::class,'open']);

Route::get('/search-progres',[PerbaikanController::class,'cari']);

Route::group(['middleware' => 'auth'], function () {
	Route::get('/profil', [ProfilController::class, 'index']);
	Route::put('/profil/update/{id}', [ProfilController::class, 'update']);

	Route::group(['middleware' => 'user'], function () {
		Route::get('/my-vehicle/{id}/{nik}', [ProfilController::class, 'myVehicle']);
		Route::get('/my-vehicle/show/{id}/{no_plat}', [ProfilController::class, 'showVehicle']);
		Route::get('/show-myVehicle-repairs/{id}/{kode_perbaikan}', [ProfilController::class, 'showMyVehicleRepairs']);
	});

	Route::group(['middleware' => 'admin'], function () {
		Route::get('/manage-menu', [MenuController::class, 'index']);
		Route::get('/manage-vehicles', [MenuController::class,'vehicles']);
		Route::get('/manage-users', [MenuController::class, 'users']);
		Route::get('/manage-repairs', [MenuController::class, 'repairs']);
		Route::get('/manage-berita', [MenuController::class, 'berita']);
		Route::get('/manage-about', [MenuController::class, 'about']);

		Route::post('/manage-users/store', [UsersController::class, 'store']);;
		Route::get('/manage-users/edit/{id}/{nik}', [UsersController::class, 'edit']);
		Route::put('/manage-users/update', [UsersController::class, 'update']);
		Route::get('/manage-users/delete/{id}', [UsersController::class, 'destroy']);
		Route::get('/manage-users/show/{id}/{nik}', [UsersController::class, 'show']);

		Route::post('/manage-vehicles/store', [KendaraanController::class, 'store']);
		Route::get('/manage-vehicles/edit/{id}/{no_plat}', [KendaraanController::class, 'edit']);
		Route::put('/manage-vehicles/update', [KendaraanController::class, 'update']);
		Route::get('/manage-vehicles/delete/{id}',[KendaraanController::class,'destroy']);
		Route::get('/manage-vehicles/show/{id}/{no_plat}',[KendaraanController::class,'show']);

		Route::post('/manage-repairs/store', [PerbaikanController::class, 'store']);
		Route::get('/manage-repairs/edit/{id}/{kode_perbaikan}', [PerbaikanController::class, 'edit']);
		Route::put('/manage-repairs/update', [PerbaikanController::class, 'update']);
		Route::get('/manage-repairs/delete/{id}', [PerbaikanController::class, 'destroy']);
		Route::get('/manage-repairs/show/{id}/{kode_perbaikan}', [PerbaikanController::class, 'show']);

		Route::get('/manage-progres/progres/{id}/{kode_perbaikan}', [ProgresController::class, 'show']);
		Route::post('/manage-progres/store', [ProgresController::class, 'store']);
		Route::get('/manage-progres/delete/{id}', [ProgresController::class, 'destroy']);

		Route::get('/manage-berita/add', [BeritaController::class, 'create']);
		Route::post('/manage-berita/add/store', [BeritaController::class, 'store']);
		Route::get('/manage-berita/edit/{slug}', [BeritaController::class, 'edit']);
		Route::post('/manage-berita/edit/update', [BeritaController::class, 'update']);
		Route::get('/manage-berita/show/{id}/{slug}', [BeritaController::class, 'show']);
		Route::get('/manage-berita/delete/{id}',[BeritaController::class, 'destroy']);
		Route::post('/manage-berita/add/kategori',[BeritaController::class, 'storeCategory']);
		Route::get('/manage-berita/delete/kategori/{id}',[BeritaController::class, 'destroyCategory']);

		Route::post('/manage-about/edit/{id}', [ProfilBengkelController::class, 'update']);

		Route::post('/manage-layanan/add', [LayananController::class, 'store']);
		Route::post('/manage-layanan/update/{id}', [LayananController::class, 'update']);
		Route::get('/manage-layanan/delete/{id}', [LayananController::class, 'destroy']);
	});

	Route::group(['middleware' => 'owner'], function () {
		Route::get('/garage-report', [ProfilController::class, 'report']);
		Route::get('/report-repairs/show/{id}/{kode_perbaikan}', [ProfilController::class, 'reportRepairs']);
		Route::get('/report-vehicles/show/{id}/{no_plat}',[ProfilController::class,'showVehicleReport']);
	});
});




