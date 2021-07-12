<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DailyTextImport;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\DailyText;

class DailyTextController extends Controller
{
    
    function index(){

        return view("dailyText");

    }

    function fetch(){

        $dailyText = DailyText::paginate(20);
        return response()->json(["texts" => $dailyText]);

    }

    function uploadFile(Request $request){

        $originName = $request->file('file')->getClientOriginalName();
        $extension = $request->file('file')->getClientOriginalExtension();
        $fileName = Carbon::now()->timestamp . '_' . uniqid().'.'.$extension;
    
        $request->file('file')->move(public_path('uploads'), $fileName);
        $fileRoute = url('/').'/uploads/'.$fileName;
        $this->readFile($fileName);

        return response()->json(["fileRoute" => $fileRoute, "originalName" => $originName,"extension" => $extension]);

    }

    function readFile($fileName){

        Excel::import(new DailyTextImport,  public_path('/').'/uploads/'.$fileName);

    }

}
