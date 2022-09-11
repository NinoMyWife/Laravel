<?php

use App\Http\Controllers\ExtraFeesController;
use App\Http\Controllers\FeelistsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/fraishorsforfait', [ExtraFeesController::class, 'display'])->middleware(['auth']);
// Route::post('/fraishorsforfait', [ExtraFeesController::class, 'store'])->middleware(['auth'])->name('extrafees.store');
Route::get('/listefrais', [FeelistsController::class, 'display'])->middleware(['auth']);
Route::post('/listefrais', [FeelistsController::class, 'store'])->middleware(['auth'])->name('listefrais.store');

Route::get('/fraishorsforfait', [ExtraFeesController::class, 'display'])->middleware(['auth']);
Route::post('/fraishorsforfait', [ExtraFeesController::class, 'store'])->middleware(['auth'])->name('fraishorsforfait.store');
Route::get('/download/fraishorsforfait/{linesfeeoutpackage}', [ExtraFeesController::class, 'download'])->middleware(['auth'])->name('fraishorsforfait.download');