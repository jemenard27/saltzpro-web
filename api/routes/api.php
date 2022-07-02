<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Query\BetController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BranchNameController;
use App\Http\Controllers\Query\LoginUserController;
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
                    ->join('tbl_brance_name', 'no_branch', '=', 'pc_number')
                    ->join('ref_branch_rec', 'no_br_rec', '=', 'tbl_brance_name.pc_branch')
                    ->select('brnch_add', 'brnch_name', 'brnch_plasada', 'id', 'branch_id', 'pc_number', 'pc_name', 'user_type')
                    ->first();
    return $data;
});

Route::post('/login', LoginController::class, 'LoginUser');

Route::controller(CurrentSultadaController::class)->group(function() {
    Route::get('/sultada/{cur_id}', 'getCurrentSltd');
    Route::get('/result/{sltd}', 'getResult');
    Route::put('/nextsultada', 'getNextSultada');
    Route::post('/addbet', 'addBet');
    Route::get('/sample', 'getSample');
    Route::post('/getUser', 'getUser');
    Route::get('/getUserEmail', 'getUserEmail');
});

Route::controller(LoginUserController::class)->group(function() {
    Route::post('/getUser', 'getUser');
    Route::get('/getUserEmail', 'getUserEmail');
});

Route::controller(BranchNameController::class)->group(function() {
    Route::post('/loginUser', 'getUserLogin');
    Route::get('/getUser', 'getUserSession');
});

Route::apiResource('bet', BetController::class);