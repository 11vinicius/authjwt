<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SoapWebService;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthController::class, 'login']);

Route::post('/create', [AuthController::class, 'register']);

Route::group(['middleware'=>['apiJwt']],function(){

    Route::post('/newWorkflow', [SoapWebService::class, 'instance_workflow']);

    Route::put('/editWokflow', [SoapWebService::class, 'edit_entity']);

});


