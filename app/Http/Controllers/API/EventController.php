<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    
    function fetchEvents($month, $year){

        if($month < 10){
            $month = "0".$month;
        }


        $events = Event::with("farmActivityEvents", "farmActivityEvents.farmActivity")->where("date", "like", "%".$year."-".$month."%")->orderBy("date", "asc")->get();
        return response()->json($events);

    }

}
