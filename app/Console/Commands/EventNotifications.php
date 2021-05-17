<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use Carbon\Carbon;
use Twilio\Rest\Client;
use App\Models\PhoneNumber;

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
        $todayActivities = "Tus actividades del día son: \n";

        $event = Event::where("date", $todayDate->format("Y-m-d"))->with("farmActivityEvents", "farmActivityEvents.farmActivity")->first();
        $index = 1;
        foreach($event->farmActivityEvents as $activities){

            $todayActivities .= $index."- ".$activities->farmActivity->name."\n";
            $index++;
        }

        $params = [];
        $params['small_icon'] = url('/assets/agriculture.png'); // icon res name specified in your app


        \OneSignal::addParams($params)->sendNotificationToAll(
            $todayActivities, 
            $url = null, 
            $data = null, 
            $buttons = null, 
            $schedule = null
        );

        foreach(PhoneNumber::whereIsNotNull("validated_at")->get() as $users){

            $receiverNumber = "+".$phoneNumber->phone_number;
            $message = $todayActivities;
    
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
