<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use Carbon\Carbon;
use Twilio\Rest\Client;
use App\Models\PhoneNumber;
use App\Models\DailyText;

class EventNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía las actividades a realizar via PUSH';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

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

            $receiverNumber = env("COUNTRY_CODE").$user->phone_number;
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

    }
}
