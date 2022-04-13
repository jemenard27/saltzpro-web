<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Query\CurrentSultadaController;


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
    $data = $request->user()
                    ->join('ref_branch_rec', 'no_br_rec', '=', 'branch_id')->get();
    return $data;
});

Route::post('/login', LoginController::class);
Route::get('/sultada/{cur_id}', [CurrentSultadaController::class, 'getCurrentSltd']);
