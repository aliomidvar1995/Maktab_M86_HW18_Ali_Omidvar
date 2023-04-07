<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TrackingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboard');

Route::get('/services', [ServiceController::class, 'index'])
->name('services.index');

Route::post('/services', [ServiceController::class, 'store'])
->name('services.store');

Route::get('/services/create', [ServiceController::class, 'create'])
->name('services.create');

Route::get('/services/edit', [ServiceController::class, 'edit'])
->name('services.edit');

Route::get('/services/{id}', [ServiceController::class, 'show'])
->name('services.show');

Route::put('/services/{id}', [ServiceController::class, 'update'])
->name('services.update');

Route::delete('/services/{id}', [ServiceController::class, 'destroy'])
->name('services.destroy');

Route::post('trackings', [TrackingController::class, 'store'])
->name('trackings.store');

Route::get('trackings/create', [TrackingController::class, 'create'])
->name('trackings.create');

Route::get('trackings/{tracking_code}', [TrackingController::class, 'show'])
->name('trackings.show');