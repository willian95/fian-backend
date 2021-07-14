<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\DailyTextController;
use App\Models\Event;
use App\Models\DailyText;
use App\Models\PhoneNumber;
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

Route::get("daily-text", [DailyTextController::class, "index"]);
Route::get("daily-text/fetch", [DailyTextController::class, "fetch"]);
Route::post("daily-text/upload-file", [DailyTextController::class, "uploadFile"]);

Route::get("dates", function(){

    //meses
    for($i=1; $i<=12; $i++){

        //días
        echo "<br>";
        echo "<br>";
        for($j = 1; $j <= 31; $j++){

            //si es febrero
            if($i == 2 && $j > 28){

                break; 

            }else if(($i == 4 && $j > 30) || ($i == 6 && $j > 30) || ($i == 9 && $j > 30) || ($i == 11 && $j > 30)){

                break;

            }

            $month = $i;
            $day = $j;
            if($day < 10){
                $day = "0".$day;
            }

            if($month < 10){
                $month = "0".$month;
            }

            echo $day."/".$month."/2021<br>";

        }


    }

});

Route::get("send-test", function(){

    $todayDate = Carbon::now();
    $text = DailyText::where("date", $todayDate->format("d/m/Y"))->first();

    $params = [];
    $params['small_icon'] = url('/assets/agriculture.png'); // icon res name specified in your app


    \OneSignal::addParams($params)->sendNotificationToAll(
        "FIAN mensaje del día: ".$text->text, 
        $url = null, 
        $data = null, 
        $buttons = null, 
        $schedule = null
    );

    foreach(PhoneNumber::whereNotNull("validated_at")->get() as $user){

        $receiverNumber = "+".$user->phone_number;
        $message = "FIAN mensaje del día: ".$text->text;

        try {

            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);

        } catch (Exception $e) {
            //dd("Error: ". $e->getMessage());
        }

    }


});