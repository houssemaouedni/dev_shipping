<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatatablesController;
use App\Http\Controllers\EditCourseController;
use App\Http\Controllers\EtatAdminController;
use App\Http\Controllers\StopController;
use App\Http\Controllers\TestController;

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
    return redirect('login');
});

/**
 * Routes for user login and logout
 * Routes changements des Etat des courses
 * Routes DataTables
 */
Route::get('/dashboard',[DashboardController::class, 'index'] )->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/liste', [DashboardController::class, 'getDatatables'])->name('Datatables.list');
Route::get('/dashboard/course/{id}', [DashboardAdminController::class, 'envoyer'])->name('Datatables_envoyer');
Route::get('/dashboard/confirmation/{id}', [DashboardAdminController::class, 'confirmation'])->name('Datatables_envoyer');
Route::get('/dashboard/annulation/{id}', [DashboardAdminController::class, 'annulation'])->name('Datatables_envoyer');
/***
 * Routes creations des courses
 * Routes Edit des courses
 */
Route::get('/course', [CourseController::class, 'index'])->middleware(['auth'])->name('course');
Route::post('/create_course', [CourseController::class, 'store'])->name('courses')->middleware(['auth']);
Route::get('/course/{id}', [EditCourseController::class, 'show'])->name('course_show')->middleware(['auth']);
Route::post('/course/{id}/{client_id}/{ramassage_id}', [EditCourseController::class, 'update'])->name('course_update')->middleware(['auth']);
Route::post('/courses/{id}/{client_id}/{livraison_id}', [EditCourseController::class, 'updates'])->name('course_updates')->middleware(['auth']);
/**
 * Routes des adminsitrateurs
 * Routes des clients
 * Routes donner les prix des courses
 * routes DataTables
 *
 */
Route::get('/dashboard/admin/liste', [DashboardAdminController::class, 'getDatatables'])->name('admin')->middleware(['admin']);
Route::get('/dashboard/admin', [DashboardAdminController::class, 'index'])->name('admin_admin')->middleware(['admin']);
Route::post('/dashboard/admin_create', [DashboardAdminController::class, 'store'])->name('admin_create')->middleware(['admin']);
Route::get('dashboard/admin/client',[EtatAdminController::class, 'index'])->name('admin_client')->middleware(['admin']);
Route::get('/dashboard/admin/client/{id}', [EtatAdminController::class, 'show'])->name('admin_client_show')->middleware(['admin']);
require __DIR__.'/auth.php';
