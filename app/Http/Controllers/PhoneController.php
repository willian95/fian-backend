<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhoneNumber;
use App\Exports\PhonesExport;
use Maatwebsite\Excel\Facades\Excel;

class PhoneController extends Controller
{
    
    function index(){

       return view("phoneNumbers");

    }

    function fetch(){

        $phoneNumbers = PhoneNumber::orderBy("created_at", "desc")->paginate(20);
        return response()->json(["phoneNumbers" => $phoneNumbers]);

    }

    function exportCsv(){

        return Excel::download(new PhonesExport, 'numeros_telefonicos.xlsx');

    }

}
