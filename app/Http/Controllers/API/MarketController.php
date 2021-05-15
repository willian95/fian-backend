<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Market;
use Illuminate\Http\Request;

class MarketController extends Controller
{

    function fetchMarkets(Request $request){

        if($request->departmentId != "0"){
            
            $markets = Market::where("department_id", $request->departmentId)->with("department")->get();
        }else{
            
            $markets = Market::take(20)->with("department")->get();
        }
        
        return response()->json(["markets" => $markets]);

    }

}
