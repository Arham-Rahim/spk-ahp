<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriasController;
use App\Http\Controllers\SubkriteriasController;
use App\Http\Controllers\AlternatifsController;
use App\Http\Controllers\PenilaiansController;
use App\Http\Controllers\PembobotansController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;

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
    return view('home', [
        "title" => "HOME"
    ]);
})->middleware('auth');

Route::get('/template', function () {
    return view('template', [
        "title" => "HOME"
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('/user', UsersController::class)->middleware('auth');
Route::resource('/kriteria', KriteriasController::class)->middleware('auth');
Route::get('/subkriteria/{id}/add_subkriteria', [SubkriteriasController::class, 'add_subkriteria'])->middleware('auth');
Route::resource('/subkriteria', SubkriteriasController::class)->middleware('auth' );
Route::resource('/alternatif', AlternatifsController::class)->middleware('auth');
Route::get('/penilaian/{id}/nilai', [PenilaiansController::class, 'nilai'])->middleware('auth');
Route::resource('/penilaian', PenilaiansController::class)->middleware('auth')->middleware('auth');
Route::post('/pembobotan/cekkriteria', [PembobotansController::class, 'cekkriteria'])->middleware('auth');
Route::post('/pembobotan/ceksubkriteria', [PembobotansController::class, 'ceksubkriteria'])->middleware('auth');
Route::get('/pembobotan/subkriteria', [PembobotansController::class, 'bobotsubkriteria'])->middleware('auth');
Route::resource('/pembobotan', PembobotansController::class)->middleware('auth')->middleware('auth');
