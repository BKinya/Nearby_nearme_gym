<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym_users extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

   public function user_profile(){
       return $this->hasOne('App\User_profile');
   }

   public function sessions_91247(){
       return $this->hasMany(sessions_91247::class);
   }

}
