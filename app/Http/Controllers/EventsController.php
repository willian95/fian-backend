<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FarmActivity;
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use App\Models\FarmActivityEvent;

class EventsController extends Controller
{
    
    function index(){

        return view("events");

    }

    function getFarmActivities(){

        $farmActivities = FarmActivity::all();
        return response()->json($farmActivities);

    }

    function store(StoreEventRequest $request){

        try{

            $event = new Event;
            $event->date = $request->date;
            $event->moon_phase = $request->moonPhase;
            $event->save();

            foreach($request->activities as $activity){

                $farmActivityEvent = new FarmActivityEvent;
                $farmActivityEvent->event_id = $event->id;
                $farmActivityEvent->farm_activity_id = $activity;
                $farmActivityEvent->save();

            }

            $event = Event::with("farmActivityEvents", "farmActivityEvents.farmActivity")->where("id", $event->id)->first();

            return response()->json(["success" => true, "msg" => "Evento creado exitosamente", "event" => $event]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Algo salió mal", "err" => $e->getLine(), "ln" => $e->getLine()]);

        }

    }

    function update(StoreEventRequest $request){

        try{

            $event = Event::where("date", $request->date)->first();
            $event->moon_phase = $request->moonPhase;
            $event->update();

            foreach(FarmActivityEvent::where("event_id", $event->id)->get() as $farmActivity){
                $farmActivity->delete();
            }   

            foreach($request->activities as $activity){

                $farmActivityEvent = new FarmActivityEvent;
                $farmActivityEvent->event_id = $event->id;
                $farmActivityEvent->farm_activity_id = $activity;
                $farmActivityEvent->save();

            }

            $event = Event::with("farmActivityEvents", "farmActivityEvents.farmActivity")->where("id", $event->id)->first();

            return response()->json(["success" => true, "msg" => "Evento actualizado exitosamente", "event" => $event]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Algo salió mal", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function fetchEvents(Request $request){

        $events = Event::with("farmActivityEvents", "farmActivityEvents.farmActivity")->where("date", "like", "%".$request->year."-".$request->month."%")->get();
        return response()->json(["events" => $events]);

    }

}
