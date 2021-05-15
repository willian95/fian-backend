<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MarketRequest;
use App\Http\Requests\MarketUpdateRequest;
use App\Models\Market;

class MarketController extends Controller
{
    function store(MarketRequest $request){

        try{

            $market = new Market;
            $market->district = $request->district;
            $market->department_id  = $request->selectedDepartment;
            $market->name = $request->name;
            $market->address = $request->address;
            $market->schedule = $request->schedule;
            $market->save();

            return response()->json(["success" => true, "msg" => "Mercado creado"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Algo salió mal", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function update(MarketUpdateRequest $request){

        try{

            $market = Market::find($request->selectedId);
            $market->district = $request->district;
            $market->department_id  = $request->selectedDepartment;
            $market->name = $request->name;
            $market->address = $request->address;
            $market->schedule = $request->schedule;
            $market->update();

            return response()->json(["success" => true, "msg" => "Mercado actualizado"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Algo salió mal", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function delete(Request $request){

        try{

            $market = Market::find($request->id);
            $market->delete();

            return response()->json(["success" => true, "msg" => "Mercado eliminado"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Algo salió mal", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function fetch($page){

        $dataAmount = 20;
        $skip = ($page - 1) * $dataAmount;
    
        $markets = Market::skip($skip)->take($dataAmount)->with("department")->get();
        $marketsCount = Market::count();

        return response()->json(["markets" => $markets, "marketsCount" => $marketsCount, "dataAmount" => $dataAmount]);

    }

}
