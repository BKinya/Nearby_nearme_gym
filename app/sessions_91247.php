<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sessions_91247 extends Model
{
    //
    public function gym_users(){
        return $this->belongsTo(Gym_users::class);
    }
}
