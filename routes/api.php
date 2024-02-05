<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CrowlerController;
use App\Http\Controllers\ExcellenceAndExpertiseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('getMenus', [MenuController::class, 'getMenus']);
Route::get('showNavigation', [MenuController::class, 'showNavigation']);
Route::get('showSlider', [SliderController::class, 'showSlider']);
Route::get('showCrowler', [CrowlerController::class, 'showCrowler']);
Route::get('showExcellenceAndExpertise', [ExcellenceAndExpertiseController::class, 'showExcellenceAndExpertise']);
