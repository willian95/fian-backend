<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use Carbon\Carbon;

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
        $todayActivities = "";

        $event = Event::where("date", $todayDate->format("Y-m-d"))->with("farmActivityEvents", "farmActivityEvents.farmActivity")->first();
        $index = 1;
        foreach($event->farmActivityEvents as $activities){

            $todayActivities .= $index."- ".$activities->farmActivity->name."\n";
            $index++;
        }

        $params = [];
        $params['small_icon'] = 'ic_stat_distriqt_default'; // icon res name specified in your app


        \OneSignal::addParams($params)->sendNotificationToAll(
            $todayActivities, 
            $url = null, 
            $data = null, 
            $buttons = null, 
            $schedule = null
        );

    }
}
