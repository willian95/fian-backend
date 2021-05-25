<?php

namespace App\Exports;

use App\Models\Market;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MarketsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('excels.markets', [
            'markets' => Market::with("department")->get()
        ]);
    }
}
