<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Waynelogic\MagicForms\Controllers\MagicFormsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'api/'], function () {
    Route::any('magic-forms', [MagicFormsController::class, 'index'])->name('magic-forms');
});
