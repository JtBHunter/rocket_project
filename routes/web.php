<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CVController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\ReferenceController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CVController::class, 'index'])->name('cv.index');
Route::post('/cv/store', [CVController::class, 'store'])->name('cv.create');
Route::post('/university/store', [UniversityController::class, 'store'])->name('university.store');
Route::post('/technology/store', [TechnologyController::class, 'store'])->name('technology.store');

Route::get('/reference/one', [ReferenceController::class, 'referenceOne'])->name('reference.reference_one');
Route::get('/reference/two', [ReferenceController::class, 'referenceTwo'])->name('reference.reference_two');
Route::get('/reference/fetch_cvs', [ReferenceController::class, 'fetchCVs'])->name('reference.fetch_cvs');
