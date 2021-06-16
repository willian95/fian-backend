<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function contact(Request $request){

        $description = $request->text;

        $to_name = "Admin";
        $to_email = env("MAIL_FROM_ADDRESS");
        $data = ["description" => $description];

        \Mail::send("mails.contact", $data, function($message) use ($to_name, $to_email) {

            $message->to($to_email, $to_name)->subject("¡Un usuario te ha escrito!");
            $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

        });

        return response()->json(["success" => true, "msg" => "Mensaje enviado"]);

    }
}
