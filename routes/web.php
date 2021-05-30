<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MarketController;
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

Route::get('/logout', [AuthController::class, "logout"])->middleware("auth");

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
Route::get("/event/download/csv/{startDate}/{endDate}", [EventsController::class, "exportCsv"]);

Route::get("/departments/fetch", [DepartmentController::class, "fetch"]);


Route::get("/market", function(){

    return view("market");

})->middleware("auth");

Route::post("market/store", [MarketController::class, "store"]);
Route::get("market/fetch/{page}", [MarketController::class, "fetch"]);
Route::post("market/update", [MarketController::class, "update"]);
Route::post("market/delete", [MarketController::class, "delete"]);
Route::get("market/download/csv", [MarketController::class, "exportCsv"]);

Route::get("send-test", function(){

    $todayDate = Carbon::now();
    $todayActivities = "";

    $event = Event::where("date", $todayDate->format("Y-m-d"))->with("farmActivityEvents", "farmActivityEvents.farmActivity")->first();
    $index = 1;
    foreach($event->farmActivityEvents as $activities){

        $todayActivities .= $index."- ".$activities->farmActivity->name."\n";
        $index++;
    }


    \OneSignal::sendNotificationToAll(
        $todayActivities, 
        $url = null, 
        $data = null, 
        $buttons = null, 
        $schedule = null
    );


});