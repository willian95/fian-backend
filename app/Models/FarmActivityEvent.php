<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmActivityEvent extends Model
{
    use HasFactory;

    function event(){

        return $this->belongsTo(Event::class);

    }

    function farmActivity(){

        return $this->belongsTo(FarmActivity::class);

    }

}
