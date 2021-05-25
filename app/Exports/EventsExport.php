<?php

namespace App\Exports;

use App\Models\Event;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EventsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function forFromDate($startDate)
    {
        $this->fromDate = $startDate;
        
        return $this;
    }

    public function forToDate($endDate)
    {
        $this->toDate = $endDate;
        
        return $this;
    }

    public function view(): View
    {
        return view('excels.events', [
            'events' => Event::with("farmActivityEvents", "farmActivityEvents.farmActivity")->whereDate('date', '>=', $this->fromDate)->whereDate("date", '<=', $this->toDate)->get()
        ]);
    }

    public function columnFormats(): array
    {
        return [
            'A' => "@",
            'B' => "@",
            'C' => "@",
            'D' =>  "@",
        ];
        
    }
}
