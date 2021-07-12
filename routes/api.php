<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\MarketController;
use App\Http\Controllers\API\VerifyNumberController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\DailyTextController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('sendSMS', [VerifyNumberController::class, "sendCode"]);

Route::get("/events/{month}/{year}", [EventController::class, "fetchEvents"]);

Route::post("/markets", [MarketController::class, "fetchMarkets"]);

Route::post("/store-number", [VerifyNumberController::class, "storePhoneNumber"]);

Route::post("/verify-number", [VerifyNumberController::class, "verify"]);

Route::post("/contact", [ContactController::class, "contact"]);

Route::get("/daily-text", [DailyTextController::class, "fetch"]);