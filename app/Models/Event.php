<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    function farmActivityEvents(){

        return $this->hasMany(FarmActivityEvent::class);

    }

}
