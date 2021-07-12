<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\DailyText;

class DailyTextImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $index = 0;
        foreach ($collection as $row) 
        {

            if($index > 2 && $row[0] != ""){


                if(DailyText::where("date", $row[0])->count() > 0){
                    $dailyText = DailyText::where("date", $row[0])->first();
                    $dailyText->text = $row[1];
                    $dailyText->update();
                }else{

                    $dailyText = new DailyText;
                    $dailyText->date = $row[0];
                    $dailyText->text = $row[1];
                    $dailyText->save();

                }
                

            }


            $index++;
        }

    }
}
