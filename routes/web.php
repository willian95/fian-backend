<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventsController;
use App\Models\Event;
use Carbon\Carbon;

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
    return view('login');
})->middleware("guest");

Route::post('/login', [AuthController::class, "login"]);

Route::get("/home", function(){

    return view("dashboard");

})->name("home")->middleware("auth");

Route::get("/calendar", function(){

    return view("calendar");

})->middleware("auth");

Route::get("/get-farm-activities", [EventsController::class, "getFarmActivities"]);

Route::post("/event-store", [EventsController::class, "store"]);

Route::post("/event-fetch", [EventsController::class, "fetchEvents"]);

Route::post("/event-update", [EventsController::class, "update"]);