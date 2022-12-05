<?php

use Illuminate\Support\Facades\Route;
use App\Domains\Branch\Http\Controllers\UpdateCurrentBranchController;

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

Route::get('/current-branch/{branch}', UpdateCurrentBranchController::class)
    ->middleware(['auth'])
    ->name('update_current_branch');
