<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhoneNumber;
use Carbon\Carbon;
use Twilio\Rest\Client;

class VerifyNumberController extends Controller
{
    
    function storePhoneNumber(Request $request){

        if(strlen($request->phoneNumber) > 10){
            return response()->json(["success" => false, "msg" => "Número debe tener 10 caracteres o menos"]);
        }

        $digits = 5;
        $code = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);

        $phoneNumber = PhoneNumber::updateOrCreate(
            ["phone_number" => env("COUNTRY_CODE").$request->phoneNumber],
            ["code" => $code]
        );

        $this->sendCode($phoneNumber);

        return response()->json(["success" => true, "msg" => "Código enviado"]);

    }

    function sendCode($phoneNumber){

        $receiverNumber = $phoneNumber->phone_number;
        $message = "Tu código FIAN es: ".$phoneNumber->code;
  
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

    function verify(Request $request){

        $phoneNumber = PhoneNumber::where("phone_number", $request->phoneNumber)->first();

        if($phoneNumber == null){
            return response()->json(["success" => false, "msg" => "Código no es válido"]);
        }

        if($phoneNumber->code == $request->code){

            $phoneNumber->code = null;
            $phoneNumber->validated_at = Carbon::now();
            $phoneNumber->update();

            return response()->json(["success" => true, "msg" => "Código validado"]);

        }else{

            return response()->json(["success" => false, "msg" => "Código no es válido"]);

        }

    }

}
