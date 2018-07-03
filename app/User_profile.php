<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_profile extends Model
{
    //
    public function gym_user(){
        return $this->belongsTo('App\Gym_users');
    }
}
