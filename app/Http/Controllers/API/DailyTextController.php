<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DailyText;

class DailyTextController extends Controller
{
    function fetch(Request $request){

        $dailyText = DailyText::where("date", $request->date)->first();
        return response()->json(["text" => $dailyText->text]);

    }
}
