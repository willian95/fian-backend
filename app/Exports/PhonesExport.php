<?php

namespace App\Exports;

use App\Models\PhoneNumber;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PhonesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('excels.phoneNumbers', [
            'phoneNumbers' => PhoneNumber::all()
        ]);
    }
}
