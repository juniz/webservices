<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Penjab;
use App\Http\Controllers\API\Poliklinik;
use App\Http\Controllers\API\RM01;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['cors'])->prefix('rm01')->group(function(){
    Route::get('penjab', [Penjab::class, 'index']);
    Route::get('poliklinik', [Poliklinik::class, 'index']);
    Route::post('save', [RM01::class, 'save']);
});
